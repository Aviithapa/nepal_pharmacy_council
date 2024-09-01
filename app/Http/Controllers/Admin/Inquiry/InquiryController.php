<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Http\Controllers\Controller;
use App\Repositories\Inquiry\InquiryRepository;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    protected $inquiryRepository;
     

    public function __construct(
        InquiryRepository $inquiryRepository,
        
    ) {
        $this->inquiryRepository = $inquiryRepository;
        
    }

    public function index(Request $request)
    {
        $inquiries = $this->inquiryRepository->getPaginatedList($request);
        return view('admin.pages.inquiry.index', compact('inquiries', 'request'));
    }

    
}
