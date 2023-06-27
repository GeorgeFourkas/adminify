<?php

namespace App\Http\Middleware;

use App\Traits\Multilingual;
use Closure;

class Language
{
    use Multilingual;

    public function handle($request, Closure $next)
    {
        $request->route()->forgetParameter('locale');

        return $next($request);
    }
}
