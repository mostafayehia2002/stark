<?php

namespace App\Services\Api;

use App\Models\FAQ;

class FAQService
{


    public function getAllFAQ()
    {
        $faqs =FAQ::orderBy('created_at', 'desc')->get();
        if (!$faqs->isEmpty()) {
            return [
                'success' => true,
                'data' => $faqs
            ];
        }
        return [
            'success' => false,
            'message' => translate_message('no_found_data')
        ];
    }
}
