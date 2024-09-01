<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests,  DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function save_image(Request $request, $fieldName)
    {
        try {
            $path =  $request->{$fieldName . '_image'}->store('public/documents');
            if (!$path)
                return url('storage');
            $dirs = explode('/', $path);
            if ($dirs[0] === 'public')
                $dirs[0] = 'storage';
            $response['full_url'] = url(implode('/', $dirs));
            $response['image_name'] = ($request->{$fieldName . '_image'})->hashName();
            $response['path'] = (implode('/', $dirs));
            return $response;
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
