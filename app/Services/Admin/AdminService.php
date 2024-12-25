<?php

namespace App\Services\Admin;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Requests\StoreAdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminService
{

    public function store(StoreAdminRequest $request): array
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['password'] = Hash::make($request->input('password'));
            $data['type'] = UserType::ADMIN;
            $user = User::create($data);
            $user->assignRole($request->input('roles'));
            DB::commit();
            return [
                'success' => true,
                'message' => translate_message('success_added'),
            ];

        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function edit($id): array
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();
            return [
                'success' => true,
                'user' => $user,
                'roles' => $roles,
                'userRole' => $userRole,
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }


    }

    public function update(StoreAdminRequest $request, $id): array
    {
        try {
            $data = $request->validated();
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            }
            unset($data['password']);
            DB::beginTransaction();
            $user = User::find($id);
            $user->update($data);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
            DB::commit();
            return [
                'success' => true,
                'message' => translate_message('success_updated'),
            ];
        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }


    }

    public function destroy($id): array
    {
        try {
            $user = User::findOrFail($id);
            if ($user && auth()->id() != $user->id) {
                $user->delete();
                return [
                    'success' => true,
                    'message' => translate_message('success_deleted')
                ];
            }
            return [
                'success' => false,
                'message' => translate_message('error_while_deleted')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    public function blockAdmin($id): array
    {
        try {
            $user = User::findOrFail($id);
            if ($user->id != auth()->id()) {
                if ($user->status === UserStatus::ACTIVE->value) {
                    $user->update(['status' => UserStatus::INACTIVE]);
                    return [
                        'success' => true,
                        'message' => translate_message('success_blocked')
                    ];
                } else {
                    $user->update(['status' => UserStatus::ACTIVE]);
                    return [
                        'success' => true,
                        'message' => translate_message('success_unblocked')
                    ];
                }

            }
            return [
                'success' => false,
                'message' => translate_message('error_while_blocked'),
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
