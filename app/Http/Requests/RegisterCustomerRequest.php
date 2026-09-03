<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_type'   => ['required', Rule::in(['domestic', 'international'])],
            'name'            => ['required', 'string', 'max:150'],
            'email'           => ['required', 'email', 'max:150', 'unique:customers,email'],
            'company_name'    => ['required', 'string', 'max:150'],
            'country_code'    => ['required', 'string', 'max:5'],
            'phone'           => ['required', 'digits_between:7,15', 'unique:customers,phone'],
            'country'         => ['required_if:customer_type,international', 'nullable', 'string', 'max:100'],
            'city'            => ['required', 'string', 'max:100'],
            'password'        => ['required', 'string', 'min:8', 'confirmed'],
            'phone_verified'  => ['required', 'in:1'], // OTP verify hue bina form submit na ho
        ];
    }

    public function messages(): array
    {
        return [
            'phone_verified.in' => 'Please verify your phone number before submitting.',
            'country.required_if' => 'Country is required for international customers.',
        ];
    }
}