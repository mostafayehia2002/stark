<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            "Amenities" => [
                ['en' => 'Parking', 'ar' => 'موقف سيارات'],
                ['en' => 'Swimming Pool', 'ar' => 'حمام سباحة'],
                ['en' => 'Gym', 'ar' => 'صالة رياضية'],
                ['en' => '24/7 Security', 'ar' => 'أمن على مدار الساعة'],
                ['en' => 'Elevator', 'ar' => 'مصعد'],
                ['en' => 'Garden', 'ar' => 'حديقة'],
                ['en' => 'Central AC', 'ar' => 'تكييف مركزي'],
                ['en' => 'Balcony', 'ar' => 'شرفة'],
                ['en' => 'Maid\'s Room', 'ar' => 'غرفة خادمة'],
                ['en' => 'Storage Room', 'ar' => 'غرفة تخزين'],
                ['en' => 'Kitchen Appliances', 'ar' => 'أجهزة مطبخ'],
                ['en' => 'Internet', 'ar' => 'إنترنت'],
                ['en' => 'Satellite/Cable TV', 'ar' => 'تلفزيون فضائي/كابل'],
                ['en' => 'Intercom', 'ar' => 'انتركوم'],
                ['en' => 'Maintenance', 'ar' => 'صيانة'],
                ['en' => 'Nearby Mosque', 'ar' => 'مسجد قريب'],
                ['en' => 'Shopping Centers', 'ar' => 'مراكز تسوق'],
                ['en' => 'Schools Nearby', 'ar' => 'مدارس قريبة'],
                ['en' => 'Pets Allowed', 'ar' => 'يسمح بالحيوانات الأليفة'],
            ],
            "Additional Features" => [
                ['en' => 'Sea View', 'ar' => 'إطلالة على البحر'],
                ['en' => 'City View', 'ar' => 'إطلالة على المدينة'],
                ['en' => 'Garden View', 'ar' => 'إطلالة على الحديقة'],
                ['en' => 'Street View', 'ar' => 'إطلالة على الشارع'],
                ['en' => 'Mall View', 'ar' => 'إطلالة على المركز التجاري'],
            ]
        ];

        foreach ($features as $categoryName => $featureList) {
            $category = Category::where('name->en', $categoryName)->first();
            if ($category) {
                foreach ($featureList as $feature) {
                    Feature::create([
                        'name' => $feature,
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
