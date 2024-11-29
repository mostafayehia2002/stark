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
        $data['password'] = Hash::make($request->input('password'));
        $data['type'] = UserType::ADMIN;
        $user = User::create($data);
        $user->assignRole($request->input('roles'));
        if ($user) {
            return [
                'success' => true,
                'message' => 'Successfully Added',
            ];
        }
        return [
            'success' => false,
            'message' => 'Failed to Add',
        ];
    }

    public function edit($id): array
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        if ($user) {
            return [
                'success' => true,
                'user' => $user,
                'roles' => $roles,
                'userRole' => $userRole,
            ];
        }
        return [
            'success' => false,
            'message' => 'Admin Not Found'
        ];

    }

    public function update(StoreAdminRequest $request, $id): array
    {
        $data = $request->validated();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        unset($data['password']);
        $user = User::find($id);
       $update=$user->update($data);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        if ($update) {
            return [
                'success' => true,
                'message' => 'Successfully Updated',
            ];
        }
        return [
            'success' => false,
            'message' => 'Failed to Update',
        ];

    }

    public function destroy($id): array
    {
        $user = User::find($id);
        if ($user && auth()->id() != $user->id) {
            $user->delete();
            return [
                'success' => true,
                'message' => 'Admin Deleted Successfully'
            ];
        }
        return [
            'success' => false,
            'message' => 'Error while Deleting Admin'
        ];
    }

    public function blockAdmin($id): array
    {
        $user =User::find($id);
        if ($user->id != auth()->id()) {
            if ($user->status === UserStatus::ACTIVE->value) {
                $user->update(['status' => UserStatus::INACTIVE]);

                return[
                    'success' => true,
                    'message' => 'Successfully Blocked Admin'
                ];
            } else{
                $user->update(['status' => UserStatus::ACTIVE]);
                return [
                    'success' => true,
                    'message' => 'Successfully Un Blocked'
                ];
            }

        }
        return [
            'success' => false,
            'message' => 'You Cant Block this Admin',
        ];
    }
}
