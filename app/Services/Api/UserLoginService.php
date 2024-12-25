<?php

namespace App\Services\Api;

use App\Enums\UserStatus;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Services\TwilioService;

class UserLoginService
{

    protected TwilioService $service;

    public function __construct(TwilioService $service)
    {

        $this->service = $service;
    }

    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        $user=User::where('phone', $data['phone'])->where('type',$data['type'])->first();
        if(!$user){
            return [
                'success' => false,
                'status'=>400,
                'message' => translate_message('user_not_found')
            ];
        }
        $otpResponse=$this->service->sendVerificationCode($data['phone']);
        if($otpResponse['success'] && $otpResponse['status']==='pending' ){
            return [
                'success' =>true,
                'status'=>200,
                'message' => $otpResponse['message'],
            ];
        }
        return [
            'success' => false,
            'status'=>400,
            'message' => $otpResponse['message']
        ];


    }
}
