<?php

namespace App\Rules;

use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Rule;

class LanguageIsDefaultLocale implements Rule
{
    use Multilingual;

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        return $this->getStore()->get('default_locale') !== $value;
    }

    public function message(): string
    {
        return __('You cannot unpublish the default locale. Change the default Locale first');
    }
}
