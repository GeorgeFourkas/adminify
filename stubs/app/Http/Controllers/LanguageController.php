<?php

namespace App\Http\Controllers\Adminify;

use App\Http\Requests\Language\ChangeLanguageStatusRequest;
use App\Services\Language\LanguageStatusService;
use App\Traits\Multilingual;

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
