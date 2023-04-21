<?php

namespace App\Rules;

use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Rule;

class InRegistedLanguagesArray implements Rule
{

    use Multilingual;

    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($value, $this->getAllDeclaredLanguages());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Language needs to be selected first');
    }
}
