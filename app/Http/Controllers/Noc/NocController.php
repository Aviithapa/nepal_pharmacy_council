<?php

namespace App\Http\Controllers\Noc;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Noc\CreateNumberStore;
use App\Models\Role;
use App\Repositories\Media\MediaRepository;
use App\Repositories\NocUser\NocUserRepository;
use App\Repositories\User\UserRepository;
use App\Services\Sms\SmsHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NocController extends Controller
{
    protected $nocUserRepository, $userRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        NocUserRepository $nocUserRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        UserRepository $userRepository
    ) {
        $this->nocUserRepository = $nocUserRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->userRepository = $userRepository;
    }

    public function sendOtp(CreateNumberStore $request)
    {
        try {
            DB::beginTransaction();
            
            // Generate a 6-digit OTP
            $otp = random_int(100000, 999999);
        
            // Update or create the phone number record in the database
            $this->nocUserRepository->updateOrCreate(
                ['phone_number' => $request->phone_number],
                ['token' => $otp, 'is_verified' => false]
            );
        
            // Prepare the SMS message
            $message = "{$otp} is your otp token Nepal Pharmacy Council.";
        
            // Send SMS using the SmsHandler service
            $smsHandler = new SmsHandler();
            $response = $smsHandler->send($request->phone_number, $message);
            if (is_object($response) && isset($response->response_code)) {
                if ($response->response_code === 1001) {
                    throw new \Exception('Failed to send OTP via SMS.');
                }
            }
        
            DB::commit();
    
            logger("OTP sent to {$request->phone_number}: $otp");
        
            // Flash success message and store phone number in session
            session()->flash('success', 'OTP has been sent successfully.');
            session(['phone_number' => $request->phone_number]);
        
            // Redirect to OTP verification page
            return redirect()->route('verify.token.get');
            
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback the transaction
    
            // Log the error message
            logger()->error("Failed to send OTP: {$e->getMessage()}");
    
            // Flash a generic error message and redirect back
            session()->flash('error', 'An unexpected error occurred. Please try again.');
            return redirect()->back();
        }
    }

    public function reSendOtp(Request $request)
    {
        try {
            DB::beginTransaction();
            
            // Generate a 6-digit OTP
            $otp = random_int(100000, 999999);
            $phoneNumber = session('phone_number');

        
            // Update or create the phone number record in the database
            $data = $this->nocUserRepository->all()->where('phone_number', $phoneNumber)->first();
        
            if(!$data){
                session()->flash('error', 'An unexpected error occurred. Please try again.');
                return redirect()->back();
            }
            // Prepare the SMS message
            $message = "{$data->token} is your otp token Nepal Pharmacy Council.";
        
            //  Send SMS using the SmsHandler service
            $smsHandler = new SmsHandler();
            $response = $smsHandler->send($data->phone_number, $message);
            

            if (is_object($response) && isset($response->response_code)) {
                if ($response->response_code === 1001) {
                    throw new \Exception('Failed to send OTP via SMS.');
                }
            }
          
        
            DB::commit();
    
            logger("OTP sent to {$phoneNumber}: $otp");
        
            // Flash success message and store phone number in session
            session()->flash('success', 'OTP has been sent successfully.');
            session(['phone_number' => $phoneNumber]);
        
            // Redirect to OTP verification page
            return redirect()->route('verify.token.get');
            
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback the transaction
    
            // Log the error message
            logger()->error("Failed to send OTP: {$e->getMessage()}");
    
            // Flash a generic error message and redirect back
            session()->flash('error', 'An unexpected error occurred. Please try again.');
            return redirect()->back();
        }
    }
    

    public function showVerifyToken()
    {
        $phoneNumber = session('phone_number');
        if($phoneNumber)
            return view('website.pages.noc-verify');
        return redirect()->back();
    }
    

    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required|numeric|digits:6',
        ]);
    
        // Retrieve the phone number from the session
        $phoneNumber = session('phone_number');
    
        if (!$phoneNumber) {
            session()->flash('error', 'Phone number not found. Please try again.');
            return view('website.pages.noc-verify');
        
        }
    
        // Fetch the user by phone number
        $user = $this->nocUserRepository->all()->where('phone_number', $phoneNumber)->first();
    
        if (!$user) {
            session()->flash('error', 'User not found.');
            return view('website.pages.noc-verify');
            
        }
    
        if ($user->token != $request->token) {
            session()->flash('error', 'Invalid OTP. Please try again.');
            return view('website.pages.noc-verify');
        }
    
        // OTP is valid, mark user as verified
        $user->update(['status' => 'active', 'phone_number_verified_at' => Carbon::now()]); // Clear the token after verification
        session(['phone_number' => $user->phone_number]);
        session()->flash('success', 'OTP verified successfully.');
        return redirect()->route('set.password.get');
    }

    public function showSetPassword()
    {
        $phoneNumber = session('phone_number');
        if($phoneNumber)
            return view('website.pages.noc-set-password');
        return redirect()->back();

    }


    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8', // Ensure password confirmation
            'confirm-password' => 'required|same:password', // Confirm password matches
        ]);


        // Retrieve the phone number from session
        $phoneNumber = session('phone_number');

        if (!$phoneNumber) {
            session()->flash('error', 'Phone number not found.');
            return redirect()->back();
        }

        // Hash the password
        $hashedPassword = bcrypt($request->password);

        $user = $this->nocUserRepository->all()->where('phone_number', $phoneNumber)->first();
        $user->update(['password' => $hashedPassword]); // Clear the token after verification

        $role = Role::where('name', 'noc_user')->first();
        $data['password'] = $user['password'];
        $data['email'] = $user['phone_number'];
        $data['status'] = 'active';
        $data['username'] = $user['phone_number'];
        $data['reference'] = $user['password'];
        $user = $this->userRepository->updateOrCreate(['email' => $data['email']], $data);
        if ($user == false) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
        $user->roles()->syncWithoutDetaching([$role->id]);

        session()->flash('success', 'Password has been set successfully.');
        return view('website.pages.noc-login');
    }
    
}
