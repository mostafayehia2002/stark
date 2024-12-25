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
                'message' => translate_message('success_updated'),
                'data' => $user
            ];
        }
        return [
            'success' => false,
            'message' =>translate_message('something_went_wrong'),
        ];

    }
}
