<?php

namespace App\Services\Api;
use Exception;
use Illuminate\Support\Str;
use App\Enums\UserStatus;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\TwilioService;
use Illuminate\Http\Client\ConnectionException;

class UserRegisterService
{
    protected TwilioService $service;

    public function __construct(TwilioService $service)
    {

        $this->service = $service;
    }

    /**
     * @throws ConnectionException
     */
    public function register(UserRegisterRequest $request): array
    {

        $data = $request->validated();
        $data['username'] = $this->generateUsername($data['full_name']);
        $data['status'] = UserStatus::INACTIVE;
        $existingUser=User::where('phone', $data['phone'])->where('type',$data['type'])->first();
        if ($existingUser){
            return [
                'success' => false,
                'status'=>400,
                'message' => translate_message('account_already_exist')
            ];
        }
        try {
            $otpResponse=$this->service->sendVerificationCode($data['phone']);

         if($otpResponse['success'] && $otpResponse['status']==='pending' ){
            User::create($data);
             return [
                 'success' =>true,
                 'status'=>201,
                 'message' => $otpResponse['message'],
             ];
         }
        return [
            'success' => false,
            'status'=>400,
            'message' => $otpResponse['message']
        ];
    }catch (Exception $exception){
            return [
                'success' => false,
                'status'=>500,
                'message' => $exception->getMessage()
            ];
        }
    }




    function generateUsername($fullName)
    {
        $username = Str::slug($fullName, '_');
        $counter = 1;
        $originalUsername = $username;
        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . '_' . $counter++;
        }
        return $username;
    }

}
