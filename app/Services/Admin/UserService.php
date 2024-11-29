<?php

namespace App\Services\Admin;

use App\Enums\UserStatus;
use App\Models\User;

class UserService
{

    public function destroy($id): array
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return [
                'success' => true,
                'message' => 'User Deleted Successfully'
            ];
        }
        return [
            'success' => false,
            'message' => 'User Not Found'
        ];
    }

    public function blockUser($id): array
    {
        $user =User::find($id);
            if ($user->status === UserStatus::ACTIVE->value) {
                $user->update(['status' => UserStatus::INACTIVE]);
                return[
                    'success' => true,
                    'message' => 'Successfully Blocked User'
                ];
            } else{
                $user->update(['status' => UserStatus::ACTIVE]);
                return [
                    'success' => true,
                    'message' => 'Successfully Un Blocked User'
                ];
            }


    }
}
