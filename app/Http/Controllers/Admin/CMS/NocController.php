<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use App\Repositories\NocUser\NocApplicationRepository;
use App\Repositories\User\UserRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NocController extends Controller
{

    protected $nocApplicationRepository, $userRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        NocApplicationRepository $nocApplicationRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        UserRepository $userRepository
    ) {
        $this->nocApplicationRepository = $nocApplicationRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $noc = $this->nocApplicationRepository->getPaginatedList($request, 'noc');
        $statuses = ['pending', 'approved', 'rejected']; // Example statuses

        // Fetch counts from repository
        $statusCountsData = $this->nocApplicationRepository->getStatusCounts($statuses);
        
        // Initialize result with zero counts
        $statusCounts = array_fill_keys($statuses, 0);
        
        // Merge database results into predefined statuses
        foreach ($statusCountsData as $status => $data) {
            $statusCounts[$status] = $data['count'];
        }
         return view('admin.pages.cms.noc.index', compact('noc', 'request', 'statusCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applicant = $this->nocApplicationRepository->findOrFail($id);
        return view('admin.pages.cms.noc.show', compact('applicant'));
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
             $data['status'] = 'rejected'; // Default status
            $data['remarks'] = $data['remarks'] ?? '';
            $banner = $this->nocApplicationRepository->update($id, $data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            DB::commit();
            session()->flash('success', 'Noc Form has been updated successfully.');
            return redirect()->route('noc-main.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function approve(Request $request, string $id)
    {
        $data = $request->all();
        
        try {
            DB::beginTransaction();
    
            // Generate UUID
            $data['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();
    
            // Get next auto-incremented ref from the database
            $data['ref'] = $this->nocApplicationRepository->getNextRef(); // Repository method to get the next ref
    
            $data['status'] = 'approved'; // Default status
            
            $nocData = $this->nocApplicationRepository->findOrFail($id);
    
            $pdf = Pdf::loadView('admin.pages.cms.noc.noc_registration', [
                'nocData' => $nocData,
                'currentDate' => Carbon::now()->format('Y-m-d'),
            ]);
    
            $invoicesPath = storage_path('app/public/noc/' . $nocData->id);
            if (!file_exists($invoicesPath)) {
                mkdir($invoicesPath, 0755, true);
            }
    
            $pdf_file_name = 'noc_' . $data['ref'] . '.pdf';
            $pdf->save($invoicesPath . '/' . $pdf_file_name);
            $pdf_url = 'noc/'. $nocData->id . '/' . $pdf_file_name;
    
            $data['pdf_link'] = $pdf_url;
    
            $banner = $this->nocApplicationRepository->update($id, $data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
    
            DB::commit();
            session()->flash('success', 'Noc Form has been submitted successfully.');
            return redirect()->route('noc-main.index');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
