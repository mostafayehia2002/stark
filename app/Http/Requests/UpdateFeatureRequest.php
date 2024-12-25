<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'feature_id' => 'required|exists:features,id',
            'name_en' => 'required|unique:features,name->en,'.$this->input('feature_id'),
            'name_ar' => 'required|unique:features,name->ar,'.$this->input('feature_id'),
        ];
    }
}
