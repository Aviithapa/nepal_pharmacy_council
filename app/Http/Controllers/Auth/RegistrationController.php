<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Mail\RegistrarUser;
use App\Models\Applicant;
use App\Models\Role;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    //
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        return view('auth.register');
    }

    public function verifyOtpIndex($email)
    {
        $user = $this->userRepository->all()->where('email', $email)->first();
        if (!$user)
            return redirect()->back()->withErrors([
                'active' => 'No user found'
            ]);
        Mail::to($user->email)->send(new RegistrarUser($user, $user['token']));
        return view('auth.register-otp-verify', compact('email'));
    }
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        try {
            $data['token'] = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $role = Role::where('name', RoleEnum::APPLICANT)->first();
            $data['position'] = RoleEnum::APPLICANT;
            $data['reference'] = $data['password'];
            $data['password'] = bcrypt($data['password']);
            $data['phone_number'] = $data['token'];
            $user = $this->userRepository->store($data);
            if ($user == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $user->roles()->attach($role);
            Mail::to($user->email)->send(new RegistrarUser($user, $data['token']));
            return redirect()->route('register.verify.otp', ['email' => $data['email']]);
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'email' => 'required|email',
        ]);


        $otp = $request->input('otp');
        $email = $request->input('email');

        $user = User::where('email', $email)
            ->where('token', $otp)
            ->first();

        if (!$user) {
            session()->flash('danger', 'Invalid otp not found.');
            return redirect()->back()->withInput();
        }
        $user->status = 1;
        $user->save();
        return redirect()->route('login');
    }

    public function resendOtp($email)
    {
        $user = User::where('email', $email)
            ->first();
        $token = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $user->token = $token;
        $user->save();
        // Mail::to($user->email)->send(new RegistrarUser($user, $token));
        return redirect()->route('register.verify.otp', ['email' => $email])->with('token', 'Token has been sent to the email');
    }
}
