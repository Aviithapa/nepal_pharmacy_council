<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    protected $userRepository, $postRepository, $settingRepository;

    public function __construct(
        UserRepository $userRepository,
        PostRepository $postRepository,
        SettingRepository $settingRepository

    ) {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
        $this->settingRepository = $settingRepository;
    }


    public function index()
    {
        $role = Auth::user()->mainRole() ? Auth::user()->mainRole()->name : 'default';
        $registrar = $this->postRepository->all()->where('excerpt','registrar')->first();
        $chairman = $this->postRepository->all()->where('excerpt','chairman')->first();
        $settings = $this->settingRepository->all();
        switch ($role) {
            case 'admin':
                return view('admin.dashboard.admin', compact('registrar', 'chairman', 'settings'));
                break;

            default:
                return $this->view('dashboard.default');
                break;
        }
    }
}
