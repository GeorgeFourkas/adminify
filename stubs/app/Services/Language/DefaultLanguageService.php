<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
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

    public function setLocale(): static
    {
        app()->setLocale($this->language);

        return $this;
    }

    public function cache(): static
    {
        app()->setLocale($this->language);

        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:cache');

        return $this;
    }
}
