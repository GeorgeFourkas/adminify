<?php

namespace App\Rules;

use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Rule;

class InPublishedLanguagesArray implements Rule
{
    use Multilingual;

    public function __construct()
    {

    }

    public function passes($attribute, $value): bool
    {
        return in_array($value, $this->getPublishedLanguages());
    }

    public function message(): string
    {
        return __('The Language must be first added to the translations list, and then published');
    }
}
