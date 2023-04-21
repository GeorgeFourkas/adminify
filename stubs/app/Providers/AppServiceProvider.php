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

    public function boot(Request $request): void
    {
        if ($this->translationsAreEnabled() && $request->segment(1) && in_array($request->segment(1), array_keys($this->getStore()->get('locales')))) {
            App::setLocale($request->segment(1));
            URL::defaults(['locale' => $this->app->getLocale()]);
        }

        View::composer(['components.language-switcher', 'components.layouts.admin'], function ($view) {
            $view->with('publishedLanguages', $this->getPublishedLanguages());
            $view->with('availableLocales', $this->getStore()->get('locales'));
        });

    }
}
