<?php

namespace App\Http\Requests\Language;

use App\Rules\LocalesAreMany;
use App\Rules\NotDefaultLangauge;
use Illuminate\Foundation\Http\FormRequest;

class RemoveLanguageRequest extends FormRequest
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


    public function rules(): array
    {
        return [
            'lang' => [
                new LocalesAreMany(),
                new NotDefaultLangauge(),
            ]
        ];
    }
}
