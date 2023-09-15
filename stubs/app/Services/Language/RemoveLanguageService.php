<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Arr;
use Illuminate\Http\RedirectResponse;
use Locale;

class RemoveLanguageService
{
    use Multilingual;

    protected array $availableLocales;

    protected string $language;

    public function setLanguageName(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getStoredLanguages(): static
    {
        $this->availableLocales = $this->getStore()->get('locales');

        return $this;
    }

    public function removeFromSavedLanguages(): static
    {
        $this->availableLocales = Arr::except($this->availableLocales, $this->language);

        return $this;
    }

    public function save(): static
    {
        $this->getStore()->put('locales', $this->availableLocales);

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return $this->redirectLanguageChange()
            ->with('success', Locale::getDisplayLanguage($this->language).__('adminify.language_removed'));
    }
}
