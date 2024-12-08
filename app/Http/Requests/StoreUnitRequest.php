<?php

namespace App\Http\Requests;

use App\Enums\UnitType;
use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class StoreUnitRequest extends FormRequest
{
    use HttpResponse;
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
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => ['required', 'string', 'max:255', new Enum(UnitType::class)],
            'area' => 'required|numeric',
            'number_bedroom' => 'required|numeric|min:1 |max:9',
            'number_bathroom' => 'required|numeric|min:1 |max:9 ',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array|min:1',
            'features.*' => 'exists:features,id',
            'image' => 'required|array|min:1|max:10',
            'image.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];

    }
    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->getMessages();
        if ($this->is('api/*')) {

            throw new ValidationException($validator,
                $this->returnValidationError(422, formatErrors($errors))
            );
        }
        parent::failedValidation($validator);

    }
}
