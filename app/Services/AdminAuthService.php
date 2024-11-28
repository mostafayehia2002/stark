<?php

namespace App\Services;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Requests\LoginAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthService
{
    /**
     * Create a new class instance.
     */

    public function login(LoginAdminRequest $request): array
    {
        $credentials =$request->validated();
        $remember = $request->has('remember');
        $user = User::where('type', UserType::ADMIN)->where('status', UserStatus::ACTIVE)
            ->where(function($query) use ($credentials) {
                $query->where('email', $credentials['login'])
                    ->orWhere('phone', $credentials['login']);
            })
            ->first();
       if($user && Hash::check(request()->input('password'), $user->password)) {
           Auth::login($user,$remember);
           return [
               'success'=>true,
               'message'=>'successfully logged in',
           ];
       }
       return [
           'success'=>false,
           'message'=>'Invalid credentials',
       ];
    }


    public function logout(): array
    {
    if(Auth::check()){
    Auth::logout();
        return [
            'success' => true,
            'message' => "Successfully logged out",
        ];
    }
        return [
            'success' => false,
            'message' => "Unauthenticated",
        ];
    }

}
