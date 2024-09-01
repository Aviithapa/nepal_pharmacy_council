<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\Media\MediaRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyllabusController extends Controller
{
    protected $postRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        PostRepository $postRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository
    ) {
        $this->postRepository = $postRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $syllabus = $this->postRepository->getPaginatedList($request, 'syllabus');
        return view('admin.pages.cms.syllabus.index', compact('syllabus', 'request'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBannerRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['type'] = 'syllabus';
            $slug = $data['title']. Carbon::now();
            $data['slug'] = generateSlug($slug);
            $banner = $this->postRepository->store($data);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if (isset($data['file'])) {
                $response =  $this->fileUploader->upload($data['file'], "bod");
                $banner->image = $response['path'];
                $banner->save();
                $response['post_id'] = $banner->id;
                $this->mediaRepository->store($response);
            };
            DB::commit();
            session()->flash('success', 'syllabus has been created successfully.');
            return redirect()->route('syllabus.index');
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $banner = $this->postRepository->delete($id);
            if ($banner === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Syllabus has been deleted successfully.');
            return redirect()->route('syllabus.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
