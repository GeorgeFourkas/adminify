<?php

namespace App\Http\Middleware;

use App\Traits\Multilingual;
use Closure;
use Illuminate\Support\Arr;

class Language
{
    use Multilingual;

    public function handle($request, Closure $next)
    {
        if ($this->translationsAreEnabled()) {
            if (! in_array($request->segment(1), $this->getPublishedLanguages())) {
                if (! $request->segment(2)) {
                    $segments = $request->segments();
                    $segments = Arr::prepend($segments, $this->getStore()->get('default_locale'));

                    return redirect()->to(implode('/', $segments));
                }

                return redirect()->to(str_replace($request->segment(1) ?? '/', $this->getStore()->get('default_locale'), implode('/', $request->segments()) ?? '/'));
            }
            $settings = $this->getStore();
            if (! in_array($request->segment(1), array_keys($this->getStore()->get('locales'))) && (count(array_keys($settings->get('locales'))) > 1)) {
                if ($request->segment(2)) {
                    if (in_array($request->segment(1), $this->getPublishedLanguages())) {
                        return redirect()->to(str_replace($request->segment(1), $this->getStore()->get('default_locale'), implode('/', $request->segments())));
                    }
                }
            }
        }

        $request->route()->forgetParameter('locale');

        return $next($request);
    }
}
