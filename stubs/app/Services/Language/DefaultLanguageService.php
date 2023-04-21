<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class DefaultLanguageService
{
    use Multilingual;

    private string $language;
    private array $locales;

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        $this->getStore()->put('default_locale', $this->language);
        return $this;
    }
    

    public function getLocales(): static
    {
        $this->locales = $this->getStore()->get('locales');

        return $this;
    }

    public function ensureLanguageIsPublished(): static
    {
        $this->locales[$this->language] = ['published'];
        $this->getStore()->put('locales', $this->locales);

        return $this;
    }

    public function cache(): static
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return $this->redirectLanguageChange()
            ->with('success', __('Default Locale Changed'));
    }


}
