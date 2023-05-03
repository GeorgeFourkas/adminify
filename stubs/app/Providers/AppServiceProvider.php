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
        if ($this->translationsAreEnabled() && !in_array($request->segment(1), $this->getPublishedLanguages())) {
            redirect(implode('/', \Arr::prepend($request->segments(), $this->getStore()->get('default_locale'))))->send();
        }

        if ($this->translationsAreEnabled() && $request->segment(1) && in_array($request->segment(1), $this->getPublishedLanguages())) {
            App::setLocale($request->segment(1));
            URL::defaults(['locale' => $this->app->getLocale()]);
        }

        View::composer(['components.language-switcher', 'components.layouts.admin'], function ($view) {
            $view->with('publishedLanguages', $this->getPublishedLanguages());
            $view->with('availableLocales', $this->getStore()->get('locales'));
        });

    }
}
