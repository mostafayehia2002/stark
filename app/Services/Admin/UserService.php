<?php

namespace App\Services\Admin;

use App\Enums\UserStatus;
use App\Models\User;

class UserService
{

    public function destroy($id): array
    {
        try {
            User::findOrFail($id)->delete();

            return [
                'success' => true,
                'message' => translate_message('success_deleted')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }

    public function blockUser($id): array
    {
        $user = User::find($id);
        if ($user->status === UserStatus::ACTIVE->value) {
            $user->update(['status' => UserStatus::INACTIVE]);
            return [
                'success' => true,
                'message' =>translate_message('success_blocked')
            ];
        } else {
            $user->update(['status' => UserStatus::ACTIVE]);
            return [
                'success' => true,
                'message' => translate_message('success_unblocked')
            ];
        }


    }
}
