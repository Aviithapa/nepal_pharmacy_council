<?php

namespace App\Http\Controllers\Admin\Master;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMPharmaRequest;
use App\Models\MPharmaDetail;
use App\Repositories\Media\MediaRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MPharmaController extends Controller
{

    protected  $userRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        UserRepository $userRepository
    ) {
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
        $data = MPharmaDetail::all()->where(
        'user_id', $id
        )->first();
        return view('admin.pages.mpharma.index', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMPharmaRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();
            $data['user_id'] =  Auth::user()->id;
            $data['status'] = 'pending'; // Default status
            $data['remarks'] = $data['remarks'] ?? '';
            $banner = MPharmaDetail::create($data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            $fileFields = [
                'citizenship_front',
                'citizenship_back',
                'name_registration_of_npc_front',
                'name_registration_of_npc_back' ,
                'master_in_pharmacy_transcript_front',
                'master_in_pharmacy_transcript_back',
                'experience_details',
            ];

            foreach ($fileFields as $field) {
                if (isset($data[$field])) {
                    $response = $this->fileUploader->upload($data[$field], 'specialization/'.$banner->id);
                    $banner->{$field} = $response['path'];
                    $banner->save();
                }
            }

            
            DB::commit();
            session()->flash('success', 'M. Pharma Form has been submitted successfully.');
            return redirect()->route('m-pharma.index');
        } catch (Exception $e) {
            dd($e);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
