<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Services\TranslationsEditor\StoreTranslationsService;
use App\Services\TranslationsEditor\TranslationService;
use Illuminate\Http\Request;

class TranslationEditorController extends Controller
{
    const LOCALE_INPUT_KEY = 'translating';

    public function start(Request $request, TranslationService $service)
    {
        abort(403);

        return $service
            ->setLocaleToTranslate($request->input(self::LOCALE_INPUT_KEY))
            ->scanLanguageFiles()
            ->extractPHPTranslations()
            ->extractJSONTranslations()
            ->redirectToEditor();
    }

    public function store(Request $request, StoreTranslationsService $service)
    {
        abort(403);

        return $service
            ->setLanguage($request->input('locale', ''))
            ->setJSONContent($request->input('json_translations', []))
            ->setPHPTranslations($request->input('php_translations', []))
            ->extractJSONTranslations()
            ->storeJSONTranslations()
            ->storePHPTranslations()
            ->redirect();
    }
}
