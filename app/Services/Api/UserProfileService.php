<?php

namespace App\Services\Api;

use App\Http\Requests\UserRegisterRequest;

class UserProfileService
{

    public function profile(): array
    {
        $user = auth()->user();
        return [
            'message' => 'user profile',
            'data' => $user
        ];
    }

    public function updateProfile(UserRegisterRequest $request): array
    {
        $data = $request->validated();
        $user = auth()->user();
        $update = $user->update($data);
        if ($update) {
            return [
                'success' => true,
                'message' => 'Successfully Update Profile',
                'data' => $user
            ];
        }
        return [
            'success' => false,
            'message' => 'Failed Update Profile',
        ];

    }
}
