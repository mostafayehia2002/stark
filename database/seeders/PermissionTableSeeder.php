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

            'user-list'=>'admin.show-users',
            'user-delete'=>'admin.delete-user',
            'user-detail'=>'admin.details-user',
            'user-block'=>'admin.block-user',

            'message-list'=>'admin.show-message',
            'message-delete'=>'admin.delete-message',
            'message-read'=>'admin.read-message',

            'category-list'=>'admin.show-category',
            'category-create'=>'admin.store-category',
            'category-update'=>'admin.update-category',
            'category-delete'=>'admin.delete-category',

            'feature-list'=>'admin.show-feature',
            'feature-create'=>'admin.store-feature',
            'feature-update'=>'admin.update-feature',
            'feature-delete'=>'admin.delete-feature',

            'unit-list'=>'admin.show-unit',
            'unit-create'=>'admin.create-unit',
            'unit-edit'=>'admin.edit-unit',
            'unit-delete'=>'admin.delete-unit',
            'unit-details'=>'admin.show-details',
            'unit-change-status'=>'admin.change-status',

            'booking-request-list'=>'admin.show-booking-request',
            'booking-request-details'=>'admin.details-booking-request',
            'booking-request-delete'=>'admin.delete-booking-request',
            'booking-request-change-status'=>'admin.booking-change-status',

            'booking-list'=>'admin.show-booking',
            'booking-details'=>'admin.details-booking',
            'booking-delete'=>'admin.delete-booking',

            'show-setting'=>'admin.show-setting',
            'update-setting'=>'admin.update-setting',

            'FAQ-list'=>'admin.FAQ-list',
            'FAQ-create'=>'admin.FAQ-create',
            'FAQ-edit'=>'admin.FAQ-edit',
            'FAQ-delete'=>'admin.FAQ-delete',

        ];

        foreach ($permissions as $permission => $route) {
            Permission::create([
                'name' => $permission,
                'routes' => $route,
            ]);
        }
    }
}
