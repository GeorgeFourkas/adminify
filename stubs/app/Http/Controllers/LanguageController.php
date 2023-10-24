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
        $service
            ->setName($request->input('language_name'))
            ->isEnabled($request->has('language_status'))
            ->getLanguages()
            ->putStatus()
            ->save()
            ->cache();

        return redirect()->route('settings')
            ->with('success', 'changed default locale');
    }
}
