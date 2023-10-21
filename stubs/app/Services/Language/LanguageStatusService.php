<?php

namespace App\Services\Language;

use App\Traits\Multilingual;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class LanguageStatusService
{
    use Multilingual;

    private bool $enabled;

    private string $name;

    private array $languages;

    public function isEnabled($status): static
    {
        $this->enabled = $status;

        return $this;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLanguages(): static
    {
        $this->languages = $this->getStore()->get('locales');

        return $this;
    }

    public function putStatus(): static
    {
        $this->enabled
            ? $this->languages[$this->name] = ['published']
            : $this->languages[$this->name] = [];

        return $this;
    }

    public function save(): static
    {
        $this->getStore()->put('locales', $this->languages);

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

    public function sleep(int $seconds): static
    {
        sleep($seconds);

        return $this;
    }

    public function redirect(): RedirectResponse
    {

        return redirect()->route('settings')
            ->with('success', __('adminify.locale_change'));

    }
}
