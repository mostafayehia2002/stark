<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key'=>'site_name',
                'value'=>'Stark Brokers',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key'=>'site_logo',
                'value'=>'',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'file',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key'=>'site_description',
                'value'=>'description',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key'=>'support_phone',
                'value'=>'support_phone',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key'=>'support_email',
                'value'=>'support_email@gmail.com',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'email',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key'=>'timezone',
                'value'=>'UTC',
                'type'=>'general',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],

            [
              'key' =>'facebook',
               'value'=>'https://www.facebook.com/FaceBook',
                'type' =>'social_media',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key' =>'instagram',
                'value'=>'https://instagram.com/starkbrokers',
                'type' =>'social_media',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key' =>'whatsApp',
                'value'=>'https://wa.me/+966539313803',
                'type' =>'social_media',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key' =>'twitter',
                'value'=>'https://x.com/starbrokers',
                'type' =>'social_media',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'key' =>'linkedin',
                'value'=>'https://www.linkedin.com/company/stark-brokers',
                'type' =>'social_media',
                'is_editable'=>true,
                'input_type'=>'text',
                'created_at'=>now(),
                'updated_at'=>now()
            ],


        ];
        DB::table('settings')->insert($settings);
    }
}
