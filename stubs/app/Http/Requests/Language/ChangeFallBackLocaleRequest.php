<?php

namespace App\Http\Requests\Admin\Adminify\Language;

use Illuminate\Foundation\Http\FormRequest;

class ChangeFallBackLocaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fallback_language_name' => 'required'
        ];
    }
}
