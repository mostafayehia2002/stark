<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Services\Api\UserLoginService;
use App\Traits\HttpResponse;


class UserLoginController extends Controller
{
    use HttpResponse;
    protected  UserLoginService $userLoginService;
    //
    public function __construct(UserLoginService $userLoginService)
    {
        $this->userLoginService = $userLoginService;
    }

    public function login(UserLoginRequest $request){
        try {
            $response=$this->userLoginService->login($request);
            if($response['success']){
                return $this->returnSuccessMessage(message:$response['message']);
            }
            return $this->returnErrorMessage(400,$response['message']);
        }catch (\Exception $exception){

            return $this->returnErrorMessage(error:$exception->getMessage());
        }
    }
}
