<?php

namespace App\Traits;

trait HasNullRequestValues
{
    use Multilingual;

    public function removeNullLanguageRequestIndex(array $data): array|null
    {
        return collect($data)
            ->filter(function ($item, $key) {
                if (! is_array($item) || ! in_array($key, $this->getAllDeclaredLanguages())) {
                    return true;
                }

                return ! empty(array_filter($item));
            })
            ->toArray();
    }
}
