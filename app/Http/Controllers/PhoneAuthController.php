<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PhoneAuthController extends Controller
{
    public function sendOTP()
    {
        $phone = request('phone');
       $otp = rand(1000, 9999);
    //   $otp = 1234;
        $message = 'Your OTP is ' . $otp;

        session(['phone' => $phone, 'otp' => $otp]);
        
        sendSMS($phone, urlencode($message));

        return response()->json(['success' => true], 200);
    }

    public function resendOTP()
    {
        $phone = session('phone');
        $otp = session('otp');
    //   $otp = 1234;
        $message = 'Your OTP is ' . $otp;
  
        sendSMS($phone, urlencode($message));

        return response()->json(['success' => true], 200);
    }


    public function verifyOTP()
    {
        $userOTP = request('otp');

        $otp = session('otp', null);

        if(!isset($otp))
        {
            return response()->json(['success' => false, 'message' => 'Mobile Verification Failed'], 500);
        }

        if($otp != $userOTP)
        {
            return response()->json(['success' => false, 'message' => 'Invalid OTP'], 500);
        }

        $user = User::where('phone', session('phone'))->first();

        if(!$user) 
        {
           $user = User::create(['phone' => session('phone')]);
        }

        Auth::login($user);

        return response()->json(['success' => false, 'message' => 'Mobile Number Verified'], 200);
    }
}
