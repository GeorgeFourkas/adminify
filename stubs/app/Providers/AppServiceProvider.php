<?php

namespace App\Providers;

use App\Traits\Multilingual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    use Multilingual;

    public function register()
    {
        str()->macro('readTime', static function (string $string): int {
            return ceil(str_word_count(str($string)->squish()) / 200);
        });
    }

    public function boot(Request $request)
    {
        $this->bootUpAdminify($request);
    }

    public function bootUpAdminify(Request $request): void
    {
        $firstSegment = $request->segment(1);
        if (! $this->app->runningInConsole() && $this->translationsAreEnabled() && $this->containsPublishedLocale($firstSegment)) {
            $this->app->setLocale($firstSegment);
        }

        View::composer(['components.layouts.admin'], function ($view) {
            $view->with('publishedLanguages', $this->getPublishedLanguages());
            $view->with('availableLocales', $this->getAllDeclaredLanguages());
        });

        View::composer(['admin/*', 'components.admin.navbar', 'components.navbar'], function ($view) {
            $view->with('locales', $this->getAndSortPublishedLanguages());
            $view->with('defaultLocale', $this->getApplicationDefaultLocale());
        });
    }

    private function containsPublishedLocale($segment): bool
    {
        return $segment && in_array($segment, $this->getPublishedLanguages());
    }
}
