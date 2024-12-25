<?php

namespace App\Services\Api;


use Illuminate\Http\Request;

class UserLogoutService
{

    public function logout(Request $request): array
    {

       $user= auth()->user();
       if($user){
           $request->user()->currentAccessToken()->delete();
           return [
               'success'=>true,
               'message'=>translate_message('success_logout')
           ];
       }
       return [
           'success'=>false,
           'message'=>translate_message('something_went_wrong')
       ];
    }

}
