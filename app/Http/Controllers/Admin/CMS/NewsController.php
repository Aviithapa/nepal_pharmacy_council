<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateNewsRequest;
use App\Repositories\Media\MediaRepository;
use App\Repositories\News\NewsRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    protected $newsRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        NewsRepository $newsRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository
    ) {
        $this->newsRepository = $newsRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $news = $this->newsRepository->getPaginatedList($request, 'news');
        return view('admin.pages.cms.news.index', compact('news', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.cms.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewsRequest $request)
    {
        //
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['type'] = 'news';
            $data['slug'] = generateSlug($data['title']);
            $data['created_by'] = Auth::user()->id;
            $news = $this->newsRepository->store($data);
            if (isset($data['files']) && count($data['files']) > 0) {
                foreach ($data['files'] as $file) {
                    $response =  $this->fileUploader->upload($file, "news");
                    $response['news_id'] = $news->id;
                    $this->mediaRepository->store($response);
                }
            }
            if ($news === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            
            DB::commit();
            session()->flash('success', 'News has been created successfully.');
            return redirect()->route('news.index');
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeQuickNews(CreateNewsRequest $request)
    {
        $data = $request->all();
        try {

            
            DB::beginTransaction();
            $data['type'] = 'news';
            $data['slug'] = generateSlug($data['title']);
            $data['is_popup'] = 1;
            $data['created_by'] = Auth::user()->id;

            $news = $this->newsRepository->store($data);

            if ($news === false) {
                throw new Exception('Failed to create news.');
            }

            if (isset($data['files']) && count($data['files']) > 0) {
                foreach ($data['files'] as $file) {
                    $response = $this->fileUploader->upload($file, "news");
                    
                    if ($response === false) {
                        throw new Exception('File upload failed.');
                    }

                    $response['news_id'] = $news->id;
                    $this->mediaRepository->store($response);
                }
            }

            DB::commit();
            session()->flash('success', 'News has been created successfully.');
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong: ' . $e->getMessage());
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
        $news = $this->newsRepository->findOrFail($id);
        return view('admin.pages.cms.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        try {

            if ($request->ajax()) {
                // Validate the request data
                $request->validate([
                    'attribute' => 'required|string',
                    'checked' => 'required|boolean',
                ]);

                // Extract the attribute and checked values from the request
                $attribute = $request->input('attribute');
                $checked = $request->input('checked');

                // Update the specified resource
                DB::beginTransaction();
                $news = $this->newsRepository->update($id, [$attribute => $checked]);
                if (!$news) {
                    return response()->json(['error' => 'Oops! Something went wrong.'], 500);
                }
                DB::commit();

                return response()->json(['success' => 'Resource updated successfully.']);
            }

            DB::beginTransaction();
            $data['slug'] = generateSlug($data['title']);
            $news = $this->newsRepository->update($id, $data);

            if ($data['files'] && count($data['files']) > 0) {
                foreach ($data['files'] as $file) {
                    $response =  $this->fileUploader->upload($file, "news");
                    $response['news_id'] = $id;
                    $this->mediaRepository->store($response);
                }
            }

            if ($news === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            
            DB::commit();
            session()->flash('success', 'News has been updated successfully.');
            return redirect()->route('news.index');
        } catch (Exception $e) {
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
            $news = $this->newsRepository->delete($id);
            if ($news === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'News has been deleted successfully.');
            return redirect()->route('news.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    public function mediaDestroy(string $id)
    {
        try {
            $news = $this->mediaRepository->delete($id);
            if ($news === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Media has been deleted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
