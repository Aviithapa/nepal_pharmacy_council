<?php

namespace App\Http\Controllers\Admin\NOC;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNocFormRequest;
use App\Http\Requests\UpdateNocFormRequest;
use App\Repositories\Media\MediaRepository;
use App\Repositories\NocUser\NocApplicationRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NOCController extends Controller
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
    public function index()
    {
        $id =  Auth::user()->id;
        $data = $this->nocApplicationRepository->all()->where(
         'user_id', $id
        )->where('good_standing', false)->first();
      
        return view('admin.pages.noc.index', compact('data'));
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
    public function store(CreateNocFormRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['user_id'] =  Auth::user()->id;
            $data['status'] = 'pending'; // Default status
            $data['remarks'] = $data['remarks'] ?? '';
            $banner = $this->nocApplicationRepository->store($data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            $fileFields = [
                'citizenship_front',
                'citizenship_back',
                'slc_marksheet',
                'slc_provisional',
                'slc_character',
                'equivalence',
                'plus2_marksheet',
                'plus2_provisional',
                'plus2_character',
                'plus2_equivalence',
                'bank_voucher',
                'passport_front',
                'passport_back',
                'offer_letter'
            ];

            foreach ($fileFields as $field) {
                if (isset($data[$field])) {
                    $response = $this->fileUploader->upload($data[$field], 'noc/'.$banner->id);
                    $banner->{$field} = $response['path'];
                    $banner->save();
                    $response['noc_id'] = $banner->id;
                    $this->mediaRepository->store($response);
                }
            }

            
            DB::commit();
            session()->flash('success', 'Noc Form has been submitted successfully.');
            return redirect()->route('noc.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(UpdateNocFormRequest $request, string $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['user_id'] =  Auth::user()->id;
            $data['status'] = 'pending'; // Default status
            $data['remarks'] = $data['remarks'] ?? '';
            $banner = $this->nocApplicationRepository->update($id, $data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            $banner = $this->nocApplicationRepository->findOrFail($id);

            $fileFields = [
                'citizenship_front',
                'citizenship_back',
                'slc_marksheet',
                'slc_provisional',
                'slc_character',
                'equivalence',
                'plus2_marksheet',
                'plus2_provisional',
                'plus2_character',
                'plus2_equivalence',
                'bank_voucher',
                'passport_front',
                'passport_back',
                'offer_letter'
            ];

            foreach ($fileFields as $field) {
                if (isset($data[$field])) {
                    $response = $this->fileUploader->upload($data[$field], 'noc/'.$banner->id);
                    $banner->{$field} = $response['path'];
                    $banner->save();
                    $response['noc_id'] = $banner->id;
                    $this->mediaRepository->store($response);
                }
            }

            
            DB::commit();
            session()->flash('success', 'Noc Form has been submitted successfully.');
            return redirect()->route('noc.index');
        } catch (Exception $e) {
            DB::rollBack();
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
