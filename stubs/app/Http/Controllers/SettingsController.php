<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Requests\Language\AddLanguageRequest;
use App\Http\Requests\Language\ChangeDefaultLanguageRequest;
use App\Http\Requests\Language\RemoveLanguageRequest;
use App\Services\Language\AddLanguageService;
use App\Services\Language\DefaultLanguageService;
use App\Services\Language\RemoveLanguageService;
use App\Traits\Multilingual;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use Multilingual;

    public function sync(Request $request)
    {
        $storage = $this->getStore();
        $storage->put('unregistered_users_can_comment', $request->has('unregistered_users_can_comment'));
        $storage->put('comments_enabled', $request->has('comments_enabled'));
        $storage->put('registration_enabled', $request->has('registration_enabled'));

        return redirect()
            ->route('settings')
            ->with('success', __('settings synced successfully'));
    }

    public function addLanguage(AddLanguageRequest $request, AddLanguageService $service)
    {
        return $service
            ->setLanguageName($request->lang)
            ->getLocalesArray()
            ->addTheLanguage()
            ->save()
            ->redirect();
    }

    public function changeDefaultLanguage(ChangeDefaultLanguageRequest $request, DefaultLanguageService $service)
    {
        return $service
            ->setLanguage($request->default_locale)
            ->getLocales()
            ->ensureLanguageIsPublished()
            ->cache()
            ->redirect();
    }

    public function removeLanguage(RemoveLanguageRequest $request, RemoveLanguageService $service)
    {
        return $service
            ->setLanguageName($request->lang)
            ->getStoredLanguages()
            ->removeFromSavedLanguages()
            ->save()
            ->redirect();
    }
}
