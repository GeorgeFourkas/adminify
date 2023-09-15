<?php

namespace App\Traits;

trait HasNullRequestValues
{
    use Multilingual;

    public function removeNullLanguageRequestIndex(array $data): ?array
    {
        return collect($data)->reject(function ($subarray) {
            return collect($subarray)->every(function ($value) {
                return is_null($value);
            });
        })->toArray();
    }
}
