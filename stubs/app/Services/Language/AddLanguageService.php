<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use LaravelLang\Publisher\Exceptions\UnknownLocaleCodeException;
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

    public function exportLanguageFiles(): static
    {
        if (! file_exists(lang_path($this->language.'.json'))) {
            Artisan::call('translatable:export '.$this->language);
        }

        if (! file_exists(lang_path($this->language))) {
            try {
                Artisan::call('lang:add '.$this->language);
            } catch (UnknownLocaleCodeException $e) {
                (new Filesystem())->copyDirectory(
                    lang_path($this->getStore()->get('default_locale')), lang_path($this->language));
            }
        }
        Artisan::call('adminify:language-publish '.$this->language);

        return $this;
    }

    public function save(): static
    {
        $this->getStore()->put('locales', $this->availableLocales);

        return $this;
    }

    public function cache(): static
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:cache');

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return
            $this->redirectLanguageChange()
                ->with('success', Locale::getDisplayLanguage($this->language).__('successfully added to translations list'));
    }
}
