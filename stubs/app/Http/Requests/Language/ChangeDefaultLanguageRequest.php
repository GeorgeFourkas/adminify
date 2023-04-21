<?php

namespace App\Http\Requests\Language;

use App\Rules\InRegistedLanguagesArray;
use Illuminate\Foundation\Http\FormRequest;

class ChangeDefaultLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'default_locale' => [new InRegistedLanguagesArray()]
        ];
    }
}
