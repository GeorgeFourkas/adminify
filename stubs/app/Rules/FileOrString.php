<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\File;

//class FileOrString implements Rule
//{
//    public function __construct()
//    {
//
//    }
//
//    public function passes($attribute, $value): bool
//    {
//        return File::isFile($value) || is_string($value) || is_int($value);
//    }
//
//    public function message(): string
//    {
//        return __('Must be File or Already uploaded file');
//    }
//}

class FileOrString implements ValidationRule
{
    public function validate(string $attribute, mixed $value, $fail): void
    {
        if (is_array($value) || $this->validationFails($value)) {
            $fail('Must be File or Already uploaded file');
        }
    }

    private function validationFails(mixed $value): bool
    {
        return ! (File::isFile($value) || is_int($value));
    }
}
