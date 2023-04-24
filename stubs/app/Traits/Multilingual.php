<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;

trait Multilingual
{
    public function getStore()
    {
        return Valuestore::make(storage_path('app/settings/settings.json'));
    }

    public function translationsAreEnabled(): bool
    {
        return $this->hasMultilingualFeaturesEnabledToClient();
    }

    public function getAllLanguagesCount(): int
    {
        return count(array_keys($this->allDeclared()));
    }

    public function getAllDeclaredLanguages(): array|null
    {
        return array_keys($this->allDeclared());
    }

    public function getPublishedLanguagesCount(): int|null
    {
        return $this->onlyPublished()->count();
    }

    public function getPublishedLanguages(): array|null
    {
        return array_keys($this->onlyPublished()->toArray());
    }

    private function onlyPublished(): Collection
    {
        if ($this->getStore()) {
            return collect($this->getStore()->get('locales'))->reject(function ($item) {
                return ! in_array('published', $item);
            })->map(function ($item, $key) {
                return $key;
            });
        }

        return collect();
    }

    private function allDeclared()
    {
        return $this->getStore()->get('locales');
    }

    public function hasMultilingualFeaturesEnabledToClient(): bool
    {
        return $this->getPublishedLanguagesCount() > 1;
    }

    private function redirectLanguageChange()
    {
        $path = str_replace(url('/'), '', url()->previous());

        Artisan::call('config:clear');
        Artisan::call('route:clear');

        Artisan::call('config:cache');
        Artisan::call('route:cache');

        if ($this->translationsAreEnabled()) {
            if (Str::contains($path, \app()->getLocale())) {
                return redirect()->to($path);
            } else {
                return redirect()->to(app()->getLocale().$path);
            }
        }

        return redirect()->route('settings');
    }
}
