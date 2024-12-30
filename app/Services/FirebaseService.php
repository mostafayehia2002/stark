<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FirebaseService
{

    protected mixed $firebase_api_key;

    public function __construct()
    {
        $this->firebase_api_key = env('FIREBASE_API_KEY');
    }

    public function verifyCode($data): array
    {
        try {
            $response = Http::post('https://identitytoolkit.googleapis.com/v1/accounts:signInWithPhoneNumber?key=' . $this->firebase_api_key, [
                'sessionInfo' => $data['session_id'],
                'phoneNumber' => $data['phone'],
                'code' => $data['otp'],
            ]);
            Storage::put('firebase_response.json', $response->json());
            if ($response->successful()) {
                return [
                    'success' => true,
                    'status' => 'approved',
                    'message' => translate_message('success_verify_otp')
                ];
            }
            return [
                'success' => false,
                'status' => $response->status(),
                'message' => translate_message('failed_verify_otp'),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }
    }
}
