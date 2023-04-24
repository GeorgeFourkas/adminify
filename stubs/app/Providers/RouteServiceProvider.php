<?php

namespace App\Providers;

use App\Traits\Multilingual;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
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
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            } else {
                Route::middleware(['adminify.locale', 'web'])
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


    private function preg($str)
    {

        $regex = '/([a-z]{2}(?:-[A-Z]{2})?)(?:\s*,\s*([a-z]{2}(?:-[A-Z]{2})?)?(?:\s*;\s*q\s*=\s*(\d(?:\.\d{1,3})?))?)?/';

        preg_match_all($regex, $str, $matches, PREG_SET_ORDER);

        $languages = array();
        foreach ($matches as $match) {
            $language = $match[1];
            if (isset($match[3])) {
                $qvalue = floatval($match[3]);
            } else {
                $qvalue = 1.0;
            }
            $languages[] = array('language' => $language, 'qvalue' => $qvalue);
        }

        return $languages;
    }

}
