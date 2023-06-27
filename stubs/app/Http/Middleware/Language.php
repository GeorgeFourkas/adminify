<?php

namespace App\Http\Middleware;

use App\Traits\Multilingual;
use Closure;
use Illuminate\Support\Arr;
use ResourceBundle;


class Language
{

    use Multilingual;


    public function handle($request, Closure $next)
    {
        $request->route()->forgetParameter('locale');

        return $next($request);
    }


}
