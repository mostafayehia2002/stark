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
                'question' => ['en' => 'What is the return policy?', 'ar' => 'ما هي سياسة الإرجاع؟'],
                'answer' => ['en' => 'You can return items within 30 days.', 'ar' => 'يمكنك إرجاع العناصر خلال 30 يومًا.'],
            ],
            [
                'question' => ['en' => 'How can I track my order?', 'ar' => 'كيف يمكنني تتبع طلبي؟'],
                'answer' => ['en' => 'Use the tracking number sent to your email.', 'ar' => 'استخدم رقم التتبع المرسل إلى بريدك الإلكتروني.'],
            ],
            [
                'question' => ['en' => 'Do you offer international shipping?', 'ar' => 'هل تقدمون الشحن الدولي؟'],
                'answer' =>['en' => 'Yes, we ship to over 50 countries worldwide.', 'ar' => 'نعم، نقوم بالشحن إلى أكثر من 50 دولة حول العالم.'],
            ],
            [
                'question' => ['en' => 'How can I contact customer support?', 'ar' => 'كيف يمكنني التواصل مع دعم العملاء؟'],
                'answer' =>['en' => 'You can reach us via email or live chat.', 'ar' => 'يمكنك التواصل معنا عبر البريد الإلكتروني أو الدردشة المباشرة.'],
            ],
            [
                'question' =>['en' => 'What payment methods do you accept?', 'ar' => 'ما هي طرق الدفع التي تقبلونها؟'],
                'answer' =>['en' => 'We accept credit cards, PayPal, and bank transfers.', 'ar' => 'نقبل بطاقات الائتمان، PayPal، والحوالات البنكية.'],
            ],
        ];
       foreach ($faqs as $faq) {
           FAQ::create($faq);
       }
    }
}
