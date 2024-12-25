<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ContactUs::factory()->count(10)->create();
        $this->call([
            SettingSeeder::class,
            PermissionTableSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            FeatureSeeder::class,
            FAQSeeder::class,
        ]);


    }
}
