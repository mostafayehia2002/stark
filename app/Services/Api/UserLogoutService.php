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
               'message'=>'Successfully logged out'
           ];
       }
       return [
           'success'=>false,
           'message'=>'Something went wrong'
       ];
    }

}
