<?php

namespace App\Http\Middleware;

use App\Traits\Multilingual;
use Closure;
use Illuminate\Http\Request;

class RegistrationEnabled
{
    use Multilingual;

    public function handle(Request $request, Closure $next)
    {
        if (! $this->getStore()->get('registration_enabled')) {
            abort(404);
        }

        return $next($request);
    }
}
