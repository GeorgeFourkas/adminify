<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Illuminate\Http\RedirectResponse;
use Locale;

class AddLanguageService
{
    use Multilingual;

    protected string $language;

    protected array $availableLocales;

    public function setLanguageName(string $name): static
    {
        $this->language = $name;

        return $this;
    }

    public function getLocalesArray(): static
    {
        $this->availableLocales = $this->getStore()->get('locales');

        return $this;
    }

    public function addTheLanguage(): static
    {
        $this->availableLocales[$this->language] = [];

        return $this;
    }

    public function save(): static
    {
        $this->getStore()->put('locales', $this->availableLocales);

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return
            $this->redirectLanguageChange()
                ->with('success', Locale::getDisplayLanguage($this->language).__('successfully added to translations list'));
    }
}
