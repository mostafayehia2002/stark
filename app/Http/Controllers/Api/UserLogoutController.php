<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\UserLogoutService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;


class UserLogoutController extends Controller
{
    use HttpResponse;
    //
    protected UserLogoutService $userLogoutService;
    public function __construct(UserLogoutService $userLogoutService)
    {
        $this->userLogoutService = $userLogoutService;

    }

    public function logout(Request $request){

        try {
        $response=$this->userLogoutService->logout($request);
        if($response['success']){
            return $this->returnSuccessMessage(200,$response['message']);
        }
        return $this->returnErrorMessage(400,$response['message']);
        }catch (\Exception $e){
            return $this->returnErrorMessage(500, $e->getMessage());
        }
    }
}
