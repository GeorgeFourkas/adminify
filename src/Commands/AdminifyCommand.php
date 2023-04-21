<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class AdminifyCommand extends Command
{
    public $signature = 'adminify:install';

    public $description = 'My command';

    public function handle(): int
    {
        //Controllers
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'../../stubs/app/Http/Controllers', app_path('Http/Controllers/Adminify'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'../../stubs/app/Http/Requests', app_path('Http/Requests'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views', resource_path('views'));

        $this->updateNodePackages(function ($packages) {
            return [
                '@ckeditor/ckeditor5-autoformat' => '^37.0.1',
                '@ckeditor/ckeditor5-basic-styles' => '^37.0.1',
                '@ckeditor/ckeditor5-block-quote' => '^37.0.1',
                '@ckeditor/ckeditor5-cloud-services' => '^37.0.1',
                '@ckeditor/ckeditor5-editor-classic' => '^37.0.1',
                '@ckeditor/ckeditor5-essentials' => '^37.0.1',
                '@ckeditor/ckeditor5-font' => '^37.0.1',
                '@ckeditor/ckeditor5-heading' => '^37.0.1',
                '@ckeditor/ckeditor5-image' => '^37.0.1',
                '@ckeditor/ckeditor5-indent' => '^37.0.1',
                '@ckeditor/ckeditor5-link' => '^37.0.1',
                '@ckeditor/ckeditor5-list' => '^37.0.1',
                '@ckeditor/ckeditor5-media-embed' => '^37.0.1',
                '@ckeditor/ckeditor5-paragraph' => '^37.0.1',
                '@ckeditor/ckeditor5-paste-from-office' => '^37.0.1',
                '@ckeditor/ckeditor5-table' => '^37.0.1',
                '@ckeditor/ckeditor5-theme-lark' => '^37.0.1',
                '@ckeditor/ckeditor5-typing' => '^37.0.1',
                '@ckeditor/ckeditor5-upload' => '^37.0.1',
                '@ckeditor/vite-plugin-ckeditor5' => '^0.1.1',
                'chart.js' => '^4.2.1',
                'chartjs-chart-geo' => '^4.1.2',
                'flatpickr' => '^4.6.13',
                'flowbite' => '^1.6.3',
                'google-charts' => '^2.0.0',
                'micromodal' => '^0.4.10',
                'moment' => '^2.29.4',
                'typewriter-effect' => '^2.19.0',
            ] + $packages;
        });

        return self::SUCCESS;
    }

    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
