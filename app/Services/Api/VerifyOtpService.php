<?php
namespace App\Services\Api;

use App\Enums\UserStatus;
use App\Models\User;
use App\Services\TwilioService;

class VerifyOtpService
{
    protected TwilioService $service;

    public function __construct(TwilioService $service)
    {
        $this->service = $service;
    }

    public function verifyOtp(string $phoneNumber, string $otp)
    {
        // Call Twilio Service to verify OTP
        $verifyResponse = $this->service->verifyCode($phoneNumber, $otp);
        if (!$verifyResponse['success']) {
            return[
                'success' => false,
                'message' => 'Invalid OTP',
            ];
        }
        // Find user by phone number
        $user=User::where('phone', $phoneNumber)->first();
        if (!$user) {
            return [
                'success' => false,
                'message' => 'User not found. Please register first.',
            ];
        }
        if($verifyResponse['status']==='approved') {
            // Update user status and log in
            $user->update(['status' => UserStatus::ACTIVE]);
            // Generate token with specific scopes
            $token = $user->createToken('auth_token', ['user'])->plainTextToken;
            return [
                'success' => true,
                'message' => $verifyResponse['message'],
                'token' => $token,
            ];
        }
        return [
            'success' => false,
            'message' => $verifyResponse['message'],
        ];

   }
}