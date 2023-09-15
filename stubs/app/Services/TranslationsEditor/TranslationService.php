<?php

namespace App\Services\TranslationsEditor;

use App\Traits\Multilingual;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TranslationService
{
    use Multilingual;

    private string $locale;

    private array $availableFiles;

    private array $phpTranslationFiles = [];

    private array $jsonContent = [];

    private array $bladeParameters = [];

    public function setLocaleToTranslate(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }


    public function scanLanguageFiles(): static
    {
        $this->availableFiles = collect(scandir(lang_path($this->locale)))
            ->reject(fn($item) => $item == '.' || $item == '..')
            ->values()
            ->toArray();

        return $this;
    }

    public function extractPHPTranslations(): static
    {
        foreach ($this->availableFiles as $file) {
            $this->phpTranslationFiles[] = [
                'file' => $file,
                'content' => require lang_path($this->locale . '/' . $file),
                'original' => file_exists($this->getDefaultLocaleLanguageFilePath($file))
                    ? require $this->getDefaultLocaleLanguageFilePath($file)
                    : []
            ];
        }
        return $this;
    }

    public function extractJSONTranslations(): static
    {
        $contents = file_get_contents(lang_path($this->locale . '.json'));

        $this->jsonContent = json_decode($contents, TRUE);

        return $this;
    }



    public function redirectToEditor()
    {
        return view('admin.translation-editor', [
            'sentences' => $this->jsonContent,
            'locale' => $this->locale,
            'phpTranslations' => $this->phpTranslationFiles
        ]);
    }

    private function getOriginalLanguage($file)
    {
        $defaultLocale = $this->getStore()->get('default_locale');

        if (file_exists(lang_path($this->getStore()->get('default_locale') . '/' . $file))) {
            return require lang_path($this->getStore()->get('default_locale') . '/' . $file);
        }
        return [];
    }

    private function getDefaultLocaleLanguageFilePath($file): string
    {
        return lang_path($this->getStore()->get('default_locale') . '/' . $file);
    }

}
