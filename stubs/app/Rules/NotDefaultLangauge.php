<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotDefaultLangauge implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
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
        return $value !== config('app.fallback_locale');
    }


    public function message(): string
    {
        return __('You can not delete the default locale. Change the default locale first');
    }
}
