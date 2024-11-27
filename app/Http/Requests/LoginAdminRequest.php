<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginAdminRequest extends FormRequest
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
            'login' =>[
                'required',
                'string',
            ],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
    public function messages(): array
    {
        return [
            'login.required' => 'The email or phone number is required.',
            'login.exists' => 'No account found with the provided email or phone number.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    }
}
