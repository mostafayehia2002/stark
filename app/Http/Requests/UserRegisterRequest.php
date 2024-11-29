<?php

namespace App\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserRegisterRequest extends FormRequest
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
        $id=auth()->id();
        return [
            'full_name' =>'required|string',
            'phone' => ['required','regex:/^\+\d{1,3}\d{6,14}$/','unique:users,phone,'.$id],
            'email' => 'required|email|unique:users,email,'.$id,
            'type' => 'required|in:owner,renter',
            'business_name' => 'nullable|string',
            'business_license' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }

    public function messages(): array{
        return [
            'phone.regex' => 'The phone number must be in the international format starting with + followed by the country code and phone number.',
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->getMessages();
        if($this->is('api/*')) {

            throw new ValidationException($validator,
                $this->returnValidationError(422, formatErrors($errors))
            );
        }
        parent::failedValidation($validator);

    }
}
