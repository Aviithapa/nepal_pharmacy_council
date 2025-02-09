<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{

    public function index()
    {
        return view('auth.forget-password');
    }

    public function verifyOtpIndex()
    {
        return view('auth.verify-otp');
    }

    public function sendOtp(Request $request)
    {
        $email = $request->input('email');
        $otp = Str::random(6); // Generate a 6-digit OTP

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'No User Found']);
        }

        $password_reset_token = DB::table('password_reset_tokens')->where('email', $email)->first();
        if ($password_reset_token)
            DB::table('password_reset_tokens')->where('email', $email)->delete();


        // Store the OTP and its expiration time in the password_resets table
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => Hash::make($otp),
            'created_at' => now(),
        ]);

        // try {
        //     Mail::to($email)->send(new ResetPasswordOtp($user, $otp));
        // } catch (Expectation $e) {
        //     return redirect()->back()->withErrors(['email' => 'Email Server is down please try in a while.']);
        // }
        return view('auth.verify-otp', compact('email'));
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'email' => 'required|email',
        ]);

        $otp = $request->input('otp');
        $email = $request->input('email');

        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$passwordReset) {
            return redirect()->route('password.reset.verify')->with(['otp_error' => 'Invalid OTP.', 'email' => $email]);
        }

        if (!Hash::check($otp, $passwordReset->token)) {
            return redirect()->route('password.reset.verify')->with(['otp_error' => 'Invalid OTP.', 'email' => $email]);
        }

        // Check if the OTP has expired (5-minute validity)
        $expirationTime = now()->subMinutes(5);
        if ($passwordReset->created_at < $expirationTime) {
            return redirect()->back()->withErrors(['otp' => 'OTP has expired.']);
        }

        // OTP is valid; allow the user to reset the password
        return redirect()->route('password.reset', ['email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $reference = $request->input('password');

        // Update the user's password in the users table
        DB::table('users')
            ->where('email', $email)
            ->update(['password' => $password, 'reference' => $reference]);

        // Delete the OTP record from the password_resets table
        DB::table('password_resets')->where('email', $email)->delete();

        // Redirect the user to the login page with a success message
        return redirect()->route('login')->with('success', 'Password reset successfully. You can now log in with your new password.');
    }

    public function showChangePassword()
    {
        return view('admin.pages.password.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'min:6'],
            'new_password' => ['required', 'min:6', 'different:current_password'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
