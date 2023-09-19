<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adminify\Language\ChangeLanguageStatusRequest;
use App\Services\Language\LanguageStatusService;
use App\Traits\Multilingual;

class LanguageController extends Controller
{
    use Multilingual;

    public function status(ChangeLanguageStatusRequest $request, LanguageStatusService $service)
    {
        return $service
            ->setName($request->input('language_name'))
            ->isEnabled($request->has('language_status'))
            ->getLanguages()
            ->putStatus()
            ->save()
            ->cache()
            ->redirect();
    }
}
