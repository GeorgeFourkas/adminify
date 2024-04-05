<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;

class AdminifyLanguagePublishCommand extends Command
{
    protected $signature = 'adminify:language-publish {language}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $lang = $this->argument('language');
        if (file_exists(lang_path($lang) . 'adminify.php')) {
            return;
        }

        if (file_exists(__DIR__ . '/../../stubs/lang/' . $lang)) {
            copy(__DIR__ . '/../../stubs/lang/' . $lang . '/adminify.php', lang_path($lang . '/adminify.php'));
        } else {
            copy(__DIR__ . '/../../stubs/lang/en/adminify.php', lang_path($lang . '/adminify.php'));
        }

    }
}
