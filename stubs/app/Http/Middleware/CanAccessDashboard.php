<?php

namespace App\Http\Middleware;

use App\Constants\Permissions;
use Closure;

class CanAccessDashboard
{
    public function handle($request, Closure $next)
    {
        if ($request->user()->cannot(Permissions::ACCESS_DASHBOARD)) {
            return redirect()->to('/');
        }

        return $next($request);
    }
}
