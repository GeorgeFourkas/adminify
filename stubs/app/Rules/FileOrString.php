<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;

class FileOrString implements Rule
{
    public function passes($attribute, $value): bool
    {
        return File::isFile($value) || is_string($value) || is_int($value);
    }

    public function message(): string
    {
        return __('Must be File or Already uploaded file');
    }
}
