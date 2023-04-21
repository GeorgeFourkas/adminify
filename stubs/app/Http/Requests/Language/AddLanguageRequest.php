<?php

namespace App\Http\Requests\Language;

use App\Rules\NotAlreadySelectedLanguage;
use Illuminate\Foundation\Http\FormRequest;

class AddLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'lang' => [new NotAlreadySelectedLanguage()]
        ];
    }
}
