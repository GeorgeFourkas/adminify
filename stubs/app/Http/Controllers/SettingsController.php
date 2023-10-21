<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adminify\Language\AddLanguageRequest;
use App\Http\Requests\Admin\Adminify\Language\ChangeDefaultLanguageRequest;
use App\Http\Requests\Admin\Adminify\Language\RemoveLanguageRequest;
use App\Services\Language\AddLanguageService;
use App\Services\Language\DefaultLanguageService;
use App\Services\Language\RemoveLanguageService;
use App\Traits\Multilingual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
            ->with('success', __('adminify.settings_sync'));
    }

    public function addLanguage(AddLanguageRequest $request, AddLanguageService $service)
    {
        return $service
            ->setLanguageName($request->input('lang'))
            ->getLocalesArray()
            ->addTheLanguage()
            ->exportLanguageFiles()
            ->save()
            ->redirect();
    }

    public function changeDefaultLanguage(ChangeDefaultLanguageRequest $request, DefaultLanguageService $service)
    {
        return $service
            ->setLanguage($request->input('default_locale'))
            ->getLocales()
            ->ensureLanguageIsPublished()
            ->cache();


//        return redirect()->route('dashboard')
//            ->with('success', 'changed default locale');
    }

    public function removeLanguage(RemoveLanguageRequest $request, RemoveLanguageService $service)
    {
        return $service
            ->setLanguageName($request->input('lang'))
            ->getStoredLanguages()
            ->removeFromSavedLanguages()
            ->save()
            ->redirect();
    }
}
