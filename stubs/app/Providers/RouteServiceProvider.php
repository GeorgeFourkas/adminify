<?php

namespace App\Providers;

use App\Traits\Multilingual;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    use Multilingual;

    public const HOME = '/master/admin/dashboard';

    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            if (!$this->translationsAreEnabled()) {
                Route::name($this->getStore()->get('default_locale') . '.')
                    ->middleware('web')
                    ->prefix($this->getStore()->get('default_locale'))
                    ->group(base_path('routes/web.php'));

                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            } else {
                Route::middleware(['locale', 'web'])
                    ->prefix('{locale?}')
                    ->group(base_path('routes/web.php'));
            }
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
