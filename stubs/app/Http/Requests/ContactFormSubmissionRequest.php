<?php

namespace App\Http\Requests\Admin\Adminify;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormSubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'message' => ['nullable', 'sometimes', 'string'],
            'g-recaptcha-response' => 'recaptcha',
        ];
    }
}
