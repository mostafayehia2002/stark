<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_en'=>["required", "regex:/^[a-zA-Z ]+/"],
            'question_ar'=>["required","regex:/^[\p{Arabic} ]+/u"],
            'answer_ar'=>["required","regex:/^[\p{Arabic} ]+/u"],
            'answer_en'=>["required", "regex:/^[a-zA-Z ]+/"],
        ];
    }
}
