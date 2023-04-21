<?php

namespace App\Http\Requests\Language;

use App\Rules\InRegistedLanguagesArray;
use App\Rules\LanguageIsDefaultLocale;
use Illuminate\Foundation\Http\FormRequest;

class ChangeLanguageStatusRequest extends FormRequest
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
            'language_name' => ['required', new InRegistedLanguagesArray(), new LanguageIsDefaultLocale()],
        ];
    }
}
