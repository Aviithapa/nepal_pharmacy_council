<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use App\Repositories\MPharma\MPharmaRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
          
            return redirect()->route('m-pharma.index');
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

}
