<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faqs=[
            [
                'question' => ['en' => 'How do I schedule a property viewing?', 'ar' => 'كيف يمكنني جدولة معاينة العقار؟'],
                'answer' => ['en' => 'You can schedule a viewing by clicking the "Book a Tour" button on any property listing', 'ar' => 'يمكنك جدولة معاينة بالنقر على زر "حجز جولة" في أي قائمة عقارية.'],
            ],
            [
                'question' => ['en' => 'What documents do I need for renting?', 'ar' => 'ما المستندات المطلوبة للإيجار؟'],
                'answer' => ['en' => "Typically, you'll need valid ID, proof of income, and employment verification.", 'ar' => 'عادةً، ستحتاج إلى هوية سارية، وإثبات دخل، وتحقق من التوظيف.'],
            ],
        ];
       foreach ($faqs as $faq) {
           FAQ::create($faq);
       }
    }
}
