<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use App\Repositories\MPharma\MPharmaRepository;
use App\Repositories\User\UserRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MPharmacyController extends Controller
{

    protected  $userRepository, $mPharmaRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        MPharmaRepository $mPharmaRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        UserRepository $userRepository
    ) {
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->userRepository = $userRepository;
        $this->mPharmaRepository = $mPharmaRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = $this->mPharmaRepository->getPaginatedList($request, 'no');
        // dd($datas);
        return view('admin.pages.cms.m-pharma.index', compact('datas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applicant = $this->mPharmaRepository->findOrFail($id);
        return view('admin.pages.cms.m-pharma.show', compact('applicant'));
    }

    public function approve(Request $request, string $id)
    {
        $data = $request->all();
    
        try {
            DB::beginTransaction();
    
            // Generate UUID
            $data['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();
    
            // Get next auto-incremented ref from the database
            $data['status'] = 'approved'; // Default status
            
            $nocData = $this->mPharmaRepository->findOrFail($id);
    
    
            $banner = $this->mPharmaRepository->update($id, $data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
    
            DB::commit();
            session()->flash('success', 'M Pharma Details Form has been submitted successfully.');
          
            return redirect()->route('m-phamacy.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
    
    public function reject(Request $request, string $id)
    {
        $data = $request->all();
    
        try {
            DB::beginTransaction();
    
            // Generate UUID
            $data['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();
    
            // Get next auto-incremented ref from the database
            $data['status'] = 'rejected'; // Default status
            
            $nocData = $this->mPharmaRepository->findOrFail($id);
    
    
            $banner = $this->mPharmaRepository->update($id, $data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
    
            DB::commit();
            session()->flash('success', 'M Pharma Details Form has been submitted successfully.');
            return redirect()->route('m-phamacy.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    public function downloadImages($userId)
    {
         // Path to the folder containing images (adjust the folder structure as needed)
        $folderPath = storage_path("app/public/specialization/{$userId}/"); // This is the folder path where the images are stored
        
        // Check if the folder exists
        if (!File::exists($folderPath)) {
            return response()->json(['error' => 'Folder not found.'], 404);
        }

        // Get all image files in the folder
        $images = File::files($folderPath);

        // Check if there are images in the folder
        if (count($images) === 0) {
            return response()->json(['error' => 'No images found.'], 404);
        }

        // Prepare the images data for the PDF (array of image paths)
        $imagePaths = [];
        foreach ($images as $image) {
            // You can store the relative path or full URL depending on your requirement
            $imagePaths[] = asset('storage/noc/' . $userId . '/' . basename($image));
        }

        $nocData = $applicant = $this->mPharmaRepository->findOrFail($userId);

        $url = url($nocData->pdf_link);
        $dobFormatted = Carbon::parse($nocData->dob_ad)->format('d M Y');

        $pdf = Pdf::loadView('pdf.specialization', [
                'nocData' => $nocData,
                'currentDate' => Carbon::now()->format('d-m-Y'),
                'dob' => $dobFormatted,
                'images' => $imagePaths, 
                'userId' => $userId, 
                'applicant' => $applicant
        ]);
            
        return $pdf->download("{$applicant->title}_{$applicant->first_name}_{$applicant->last_name}.pdf");
    }

}
