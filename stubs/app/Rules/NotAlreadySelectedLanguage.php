<?php

namespace App\Rules;

use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Rule;

class NotAlreadySelectedLanguage implements Rule
{
    use Multilingual;
    
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        return !in_array($value, $this->getAllDeclaredLanguages());
    }


    public function message(): string
    {
        return __('The language is already registered');
    }
}
