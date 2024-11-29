<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Api\UserRegisterService;
use App\Traits\HttpResponse;


class UserRegisterController extends Controller
{
    use HttpResponse;
    protected  UserRegisterService $userRegisterService;
    //
    public function __construct(UserRegisterService $userRegisterService)
    {
        $this->userRegisterService = $userRegisterService;
    }


    public function register(UserRegisterRequest $request){
        try {
         $response=$this->userRegisterService->register($request);
           if($response['success']){

               return $this->returnSuccessMessage(message:$response['message']);
           }
           return $this->returnErrorMessage(400,$response['message']);
        }catch (\Exception $exception){

            return $this->returnErrorMessage(error:$exception->getMessage());
        }

    }

}
