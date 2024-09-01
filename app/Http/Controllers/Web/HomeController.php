<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Inquiry\CreateInquiryRequest;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\College\CollegeRepository;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Inquiry\InquiryRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\NewsLetterSubscribe\NewsLetterSubscribeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    //

    private $viewData;
    private $postRepository;
    private $request;
    private $inquiryRepository;
    private $newsLetterSubscribeRepository;
    private $contactRepository;
    private $newsRepository;
    private $collegeRepository;



    public function __construct(
        Request $request,
        PostRepository $postRepository,
        InquiryRepository $inquiryRepository,
        NewsLetterSubscribeRepository $newsLetterSubscribeRepository,
        ContactRepository $contactRepository,
        NewsRepository $newsRepository,
        CollegeRepository $collegeRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->inquiryRepository = $inquiryRepository;
        $this->newsLetterSubscribeRepository = $newsLetterSubscribeRepository;
        $this->contactRepository = $contactRepository;
        $this->newsRepository = $newsRepository;
        $this->collegeRepository = $collegeRepository;
        parent::__construct();
    }


    public function slug($slug = null)
    {
        $slug = $slug ? $slug : 'index';
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'website/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        $this->viewData['pageData'] = $this->postRepository->findBy('slug', $slug);
        $this->viewData['clients'] = $this->postRepository->all()->where('type', 'clients');
        $this->viewData['slug'] = $slug;
        $this->viewData['heading_team'] = $this->postRepository->findBy('id', 19, ['title', 'content', 'excerpt']);
        $this->viewData['heading_blog'] = $this->postRepository->findBy('id', 20, ['title', 'content', 'excerpt']);
        $this->viewData['discount'] = $this->postRepository->findBy('id', 15, ['title', 'image', 'content', 'excerpt']);
        if (file_exists($file_path) && $this->viewData['pageData']) {
            switch ($slug) {
                case 'index':
                    $this->viewData['banners'] = $this->postRepository->all()->where('type', 'homepage_banner');
                    $this->viewData['news'] = $this->newsRepository->findByWithPagination('type', 'news', 5);
                    $this->viewData['registrar'] = $this->postRepository->all()->where('excerpt','registrar')->first();
                    $this->viewData['chairman'] = $this->postRepository->all()->where('excerpt','chairman')->first();
                    $this->viewData['about'] = $this->postRepository->findOrFail(28);
                    $this->viewData['popup'] = $this->newsRepository->all()->where('is_popup', true)->first();
                    $this->viewData['mediaItems'] = $this->viewData['popup']->media->map(function($media) {
                        return [
                            'file' => asset('storage/' . $media->path), // Generate the full URL for the file
                            'type' => $media->mime_type === 'application/pdf' ? 'pdf' : 'image'
                        ];
                    });
                    break;
                
                case 'about':
                    $this->viewData['about'] = $this->postRepository->findOrFail(28);
                    break;
                
                case 'bod':
                    $this->viewData['members'] = $this->postRepository->all()->where('excerpt', 'member');
                    $this->viewData['registrar'] = $this->postRepository->all()->where('excerpt','registrar')->first();
                    $this->viewData['chairman'] = $this->postRepository->all()->where('excerpt','chairman')->first();
                    break;
                
                case 'staff':
                    $this->viewData['members'] = $this->postRepository->all()->where('type', 'team');
                    break;
                
                case 'institutions':
                    $this->viewData['diploma'] = $this->collegeRepository->all()->where('type', 'diploma');
                    break;

                case 'bachelor':
                    $this->viewData['bachelor'] = $this->collegeRepository->all()->where('type', 'bachelor');
                    break;

                case 'requirement-diploma':
                    $this->viewData['diploma_req'] = $this->postRepository->findOrFail(53);
                    break;
                
                case 'requirement-bachelor':
                    $this->viewData['bachelor_req'] = $this->postRepository->findOrFail(54);
                    break;
                
                case 'act':
                    $this->viewData['act'] = $this->postRepository->findOrFail(55);
                    break;
                
                case 'regulation':
                    $this->viewData['regulation'] = $this->postRepository->findOrFail(56);
                    break;

                case 'guidelines':
                    $this->viewData['guidelines'] = $this->postRepository->findOrFail(59);
                    break;
                
                case 'code-of-conduct':
                    $this->viewData['code_of_conduct'] = $this->postRepository->findOrFail(61);
                    break;

                case 'cpd-activities': 
                    $this->viewData['cpd'] = $this->postRepository->all()->where('type', 'cpd');
                    break;
                
                case 'publication': 
                    $this->viewData['publication'] = $this->postRepository->all()->where('type', 'publication');
                    break;

                    case 'gallary': 
                        $this->viewData['gallery'] = $this->postRepository->all()->where('type', 'gallery');
                        break;

                case 'syllabus': 
                    $this->viewData['syllabus'] = $this->postRepository->all()->where('type', 'syllabus');
                    break;

                case 'news':
                    $this->viewData['news'] = $this->newsRepository->findByWithPagination('type', 'news', 20);
                    break;

                

                case 'blog':
                    $this->viewData['blogs'] = $this->postRepository->findByWithPagination('type', 'blog', 12);
                    break;

                case 'about':
                    $this->viewData['about'] = $this->postRepository->findBy('id', 27, ['title', 'image', 'content']);
                    $this->viewData['banners'] = $this->postRepository->all()->where('type', 'homepage_banner');
                    $this->viewData['galleries'] = $this->postRepository->findByWithPagination('type', 'gallery', 6);
                    $this->viewData['services'] = $this->postRepository->findByWithPagination('type', 'services', 2);
                    $this->viewData['about_video'] = $this->postRepository->findBy('id', 29, ['title', 'image', 'excerpt']);
                    $this->viewData['why_us'] = $this->postRepository->findBy('id', 44, ['title', 'excerpt']);
                    break;
                
                case 'contact':
                    
                    break;
                default:
                    return view('website.pages.' . $slug,  $this->viewData);
                break;
            }
            return view('website.pages.' . $slug,  $this->viewData);
        }
        return view('website.pages.404');
    }


    public function storeInquiry(CreateInquiryRequest $request){
        $data = $request->all();
        try {
            DB::beginTransaction();
            $inquiry = $this->inquiryRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success', 'Your request has been submitted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    public function getSingleNews($id)
    {
        $this->viewData['news'] = $this->newsRepository->findBy('id', $id);
        return view('website.pages.news-details',  $this->viewData);
    }

    public function subscribeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);
        $data = $request->all();
        try {
            DB::beginTransaction();
            $inquiry = $this->newsLetterSubscribeRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success_news', 'Your request has been submitted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function storeContactUsForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'phone', 'message');
        try {
            DB::beginTransaction();
            $inquiry = $this->contactRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success_contact', 'Your request has been submitted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
