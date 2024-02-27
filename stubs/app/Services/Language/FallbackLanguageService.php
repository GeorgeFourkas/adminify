<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class FallbackLanguageService
{
    use Multilingual;

    protected string $language;

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function storeFallback(): static
    {

        /*
         * if the request's value for the fallback locale is the same, that means that the user,
         * wants to deactivate this fallback locale. So we will set the fallback locale back to
         * the default locale
         */

        if ($this->language === $this->getStore()->get('fallback_locale')) {
            $this->language = $this->getStore()->get('default_locale');
        }

        $this->getStore()->put('fallback_locale', $this->language);

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
        return redirect()->route('settings')
            ->with('success', __('adminify.settings_sync'));
    }
}
