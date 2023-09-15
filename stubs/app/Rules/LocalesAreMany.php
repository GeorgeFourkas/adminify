<?php

namespace App\Rules;

use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Rule;

class LocalesAreMany implements Rule
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
     */
    public function passes($attribute, $value): bool
    {
        return count($this->getStore()->get('locales')) > 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('At least one locale is required for the website to operate');
    }
}
