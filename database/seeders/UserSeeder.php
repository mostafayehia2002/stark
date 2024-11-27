<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'full_name'=>'mostafa yehia',
            'username' => 'admin',
            'phone'=>'01226717838',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('12345678'),
            'type'=>UserType::ADMIN
        ]);
    }
}
