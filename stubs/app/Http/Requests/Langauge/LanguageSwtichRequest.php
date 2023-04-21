<?php

namespace App\Http\Requests\Langauge;

use App\Rules\InPublishedLanguagesArray;
use Illuminate\Foundation\Http\FormRequest;

class LanguageSwtichRequest extends FormRequest
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
    public function rules()
    {
        return [
            'lang' => ['required', new InPublishedLanguagesArray()]
        ];
    }
}
