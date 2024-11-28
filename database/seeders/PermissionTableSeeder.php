<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list'=>'admin.roles.index',
            'role-create'=>'admin.roles.create',
            'role-edit'=>'admin.roles.edit',
            'role-delete'=>'admin.roles.destroy',

            'admin-list'=>'admin.show-admins',
            'admin-create'=>'admin.create-admin',
            'admin-edit'=>'admin.admins.edit',
            'admin-delete'=>'admin.delete-admin',
            'admin-block'=>'admin.block-admin',
        ];

        foreach ($permissions as $permission => $route) {
            Permission::create([
                'name' => $permission,
                'routes' => $route,
            ]);
        }
    }
}
