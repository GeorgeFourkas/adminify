<?php

namespace App\Providers;

use App\Traits\Multilingual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Multilingual;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot(Request $request)
    {
        $this->bootUpAdminify($request);
    }

    public function bootUpAdminify(Request $request): void
    {

        if (! $this->app->runningInConsole() && $this->translationsAreEnabled() && $this->containsPublishedLocale()) {
            App::setLocale($request->segment(1));
            URL::defaults(['locale' => $this->app->getLocale()]);
        }

        View::composer(['components.layouts.admin'], function ($view) {
            $view->with('publishedLanguages', $this->getPublishedLanguages());
            $view->with('availableLocales', $this->getStore()->get('locales'));
        });

        View::composer('admin/*', function ($view) {
            $view->with('locales', array_keys(config('translatable.locales')));
            $view->with('defaultLocale', config('app.fallback_locale'));
        });
    }

    private function containsPublishedLocale(): bool
    {
        return \Illuminate\Support\Facades\Request::segment(1) && in_array(\Illuminate\Support\Facades\Request::segment(1), $this->getPublishedLanguages());
    }
}
