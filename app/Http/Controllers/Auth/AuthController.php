<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if (Auth::check()) {
            if (Auth::user()->active()) {
                if (Auth::user()->mainRole()->name === 'admin') {
                    return redirect()->intended('dashboard');
                }else if (Auth::user()->mainRole()->name === 'super_admin') {
                    return redirect()->intended('dashboard');
                } else if (Auth::user()->mainRole()->name === 'noc_user') {
                    return redirect()->intended('dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->withErrors([
                        'active' => 'You must be an active user'
                    ]);
                }
            } else {
                Auth::logout();
                return redirect()->back()->withErrors([
                    'active' => 'You must be an active user to active account please  <a href="' . route('register.verify.otp', ['email' => $request->input('email')]) . '">click here</a>'
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
