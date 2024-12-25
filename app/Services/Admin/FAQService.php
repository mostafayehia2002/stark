<?php

namespace App\Services\Admin;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use App\Models\Feature;

class FAQService
{

    public function store(FAQRequest $request)
    {
        try {
            FAQ::create([
                'question' => ['en' => $request->input('question_en'), 'ar' => $request->input('question_ar')],
                'answer' => ['en' => $request->input('answer_en'), 'ar' => $request->input('answer_ar')],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_added')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(FAQRequest $request, $id)
    {
        try {
            $faq = FAQ::findOrFail($id);
            $faq->update([
                'question' => ['en' => $request->input('question_en'), 'ar' => $request->input('question_ar')],
                'answer' => ['en' => $request->input('answer_en'), 'ar' => $request->input('answer_ar')],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_updated')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy($id)
    {
        try {
            FAQ::findOrFail($id)->delete();
            return [
                'success' => true,
                'message' => translate_message('success_deleted'),
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }


    }


}
