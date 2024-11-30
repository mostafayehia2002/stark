<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
            $this->call([
                PermissionTableSeeder::class,
                 UserSeeder::class,
              //  PropertySeeder::class,
            ]);


    }
}
