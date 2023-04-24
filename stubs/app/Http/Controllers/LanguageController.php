<?php

namespace App\Http\Controllers\Adminify;

use App\Http\Requests\Language\ChangeLanguageStatusRequest;
use App\Http\Requests\Langauge\LanguageSwtichRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Services\Language\LanguageStatusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Traits\Multilingual;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class LanguageController extends Controller
{
    use Multilingual;


    public function status(ChangeLanguageStatusRequest $request, LanguageStatusService $service)
    {
        return $service
            ->setName($request->language_name)
            ->isEnabled($request->has('language_status'))
            ->getLanguages()
            ->putStatus()
            ->save()
            ->cache()
            ->sleep(10)
            ->redirect();
    }
}
