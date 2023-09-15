<?php

namespace App\Services\TranslationsEditor;

use Illuminate\Http\RedirectResponse;

class StoreTranslationsService
{
    private string $language;

    private array $sentences;

    private array $storedJSON = [];

    private array $phpTrans;


    public function setLanguage(string $locale): static
    {
        $this->language = $locale;

        return $this;
    }

    public function setJSONContent($sentences): static
    {
        $this->sentences = $sentences;

        return $this;
    }

    public function extractJSONTranslations(): static
    {
        foreach ($this->sentences as $sentence) {
            $key = $sentence['original_text'];
            $this->storedJSON[$key] = $sentence['translation'] ?? '';
        }

        return $this;
    }

    public function storeJSONTranslations(): static
    {
        $file = lang_path($this->language . '.json');

        file_put_contents($file, json_encode($this->storedJSON, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return $this;
    }


    public function setPHPTranslations(array $phpTranslations): static
    {
        $this->phpTrans = $phpTranslations;

        return $this;
    }

    public function storePHPTranslations(): static
    {
        foreach ($this->phpTrans as $fileName => $translations) {

            $path = lang_path($this->language . '/' . $fileName . '.php');

            file_put_contents($path, $this->generatePHPArray($translations));
        }

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return redirect()->route('translations.manage', [
            'translating' => $this->language,
        ])->with('success', __('adminify.translations_stored'));
    }


    private function generatePHPArray($translations): string
    {
        return '<?php ' . PHP_EOL . PHP_EOL .' return ' . $this->bracketedExport($translations, TRUE) . ';';
    }

    private function bracketedExport(array $expression, bool $return = FALSE)
    {
        $export = var_export($expression, TRUE);

        $patterns = [
            "/array \(/" => '[',
            "/^([ ]*)\)(,?)$/m" => '$1]$2',
            "/=>[ ]?\n[ ]+\[/" => '=> [',
            "/([ ]*)(\'[^\']+\') => ([\[\'])/" => '$1$2 => $3',
        ];

        $export = preg_replace(array_keys($patterns), array_values($patterns), $export);

        if ($return) {
            return $export;
        }
        echo $export;
    }
}
