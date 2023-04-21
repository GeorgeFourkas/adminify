<?php

namespace App\Rules;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Validation\Rule;

class FileOrString implements Rule
{

    public function __construct()
    {

    }

    public function passes($attribute, $value): bool
    {
        return \File::isFile($value) || is_string($value) || is_int($value);
    }


    public function message(): string
    {
        return __('Must be File or Already uploaded file');
    }
}
