<?php

namespace App\Services;

use App\Models\Tag;
use App\Traits\HasNullRequestValues;

class TagService
{
    use HasNullRequestValues;

    private array $data;
    private array|string $presentLocales;

    private Tag $tag;


    public function setTag(Tag $tag): static
    {
        $this->tag = $tag;
        return $this;
    }

    public function setData(array $requestData): static
    {
        $this->data = $requestData;
        return $this;
    }

    public function getPresentLocales(): static
    {
        $this->presentLocales = $this->removeNullLanguageRequestIndex($this->data);
        return $this;
    }

    public function syncTranslations(): static
    {
        $this->tag->translations()->whereNotIn('locale', array_keys($this->presentLocales))->delete();

        return $this;
    }

    public function update(): void
    {
        $this->tag->update($this->presentLocales);
    }

}
