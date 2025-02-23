<?php

namespace App\Http\Controllers\GoodStanding;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGoodStandingRequest;
use App\Repositories\Media\MediaRepository;
use App\Repositories\NocUser\NocApplicationRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoodStandingController extends Controller
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
        )->where('good_standing', true)->first();
      
        return view('admin.pages.good-standing.index', compact('data'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGoodStandingRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['user_id'] =  Auth::user()->id;
            $data['status'] = 'pending'; // Default status
            $data['remarks'] = $data['remarks'] ?? '';
            $data['good_standing'] = true;
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
                'bachelor_transcript',
                'bachelor_provisional',
                'bachelor_character',
                'bachelor_equivalence',
                'name_registration_of_npc',
                'name_registration_of_npc_back',
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
            session()->flash('success', 'Good Standing Form has been submitted successfully.');
            return redirect()->route('good-standing.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
                'bachelor_transcript',
                'bachelor_provisional',
                'bachelor_character',
                'bachelor_equivalence',
                'name_registration_of_npc',
                'name_registration_of_npc_back',
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
            session()->flash('success', 'Good Standing Form has been submitted successfully.');
            return redirect()->route('good-standing.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
