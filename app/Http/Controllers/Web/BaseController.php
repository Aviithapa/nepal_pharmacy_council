<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
    }
    public function view($view, $data = array(), $mergeData = array())
    {
        return View::make('website.' . $view, $data, $mergeData);
    }
}
