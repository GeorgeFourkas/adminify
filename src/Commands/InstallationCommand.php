<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InstallationCommand extends Command
{
    public $signature = 'adminify:install';

    public $description = 'Installs the Nalcom adminify laravel package';

    public $bar;

    public function handle(): int
    {
        $this->info('Initializing Package Installation... It will take some time! please be patient');

        $this->bar = $this->output->createProgressBar(26);
        $this->bar->advance();

        app()->make(Composer::class)->requirePackages(['laravel/breeze']);

        $this->bar->advance();

        $this->callSilently('breeze:install', [
            'stack' => 'blade',
        ]);
        $this->bar->advance();
        $this->installNodeDependencies();
        $this->bar->advance();
        $this->callSilently('storage:link');
        $this->bar->advance();

        $this
            ->installModels()
            ->installControllers()
            ->installMailables()
            ->installRequests()
            ->installTraits()
            ->installServiceClasses()
            ->installValidationRules()
            ->installPolicies()
            ->installFrontEndResources()
            ->addRoutesToAppBootstrap()
            ->installProviders()
            ->installSettings()
            ->publishConstants()
            ->copyMiddlewareClasses()
            ->addMiddlewareToHttpKernel()
            ->installRoutesFile()
            ->replaceAppConfigFile()
            ->publishTranslations()
            ->addValuesToEnvFiles()
            ->addRegisterMiddlewareToBreezeRoutes();

        copy(__DIR__.'/../../stubs/config/translatable.php', config_path('translatable.php'));
        copy(__DIR__.'/../../stubs/config/localized-routes.php', config_path('localized-routes.php'));
        copy(__DIR__.'/../../stubs/config/laravel-translatable-string-exporter.php', config_path('laravel-translatable-string-exporter.php'));
        copy(__DIR__.'/../../stubs/config/recaptcha.php', config_path('recaptcha.php'));

        $this->bar->advance();

        $this->callSilently('vendor:publish', [
            '--tag' => 'adminify-migrations',
        ]);

        $this->callSilently('vendor:publish', [
            '--provider' => 'Spatie\Permission\PermissionServiceProvider',
        ]);

        $this->callSilently('vendor:publish', [
            '--tag' => 'blade-flags',
        ]);

        $this->bar->advance();

        $this->callSilently('migrate:fresh');
        $this->bar->advance();

        $this->execShellCommand('npm install');

        $this->execShellCommand('npm run build');

        if (file_exists(resource_path('views/welcome.blade.php'))) {

            $this->replaceInFile('Route::has(', 'Route::hasLocalized(', resource_path('views/welcome.blade.php'));

            $this->replaceInFile("url('/dashboard')", "route('dashboard')", resource_path('views/welcome.blade.php'));

            $this->replaceInFile('<title>Laravel</title>', '<title>Laravel + Adminify = 	&#10084; </title>', resource_path('views/welcome.blade.php'));
        }

        $this->bar->advance();

        $this->call('roles:init');

        $this->bar->advance();

        Artisan::call('translatable:export en');
        Artisan::call('lang:add en');
        Artisan::call('adminify:language-publish en');

        Artisan::call('translatable:export el');
        Artisan::call('lang:add el');
        Artisan::call('adminify:language-publish el');

        $this->call('adminify:seed-basic');

        $this->bar->finish();
        $this->newLine()
            ->info('Successfully installed Adminify Package. Have fun using it!');

        return self::SUCCESS;
    }

    public function publishTranslations(): static
    {
        try {
            Artisan::call('lang:publish');
        } catch (\Exception $exception) {
            (new Filesystem)->ensureDirectoryExists(lang_path());
        }

        (new Filesystem)->ensureDirectoryExists(lang_path('en'));
        copy(__DIR__.'/../../stubs/lang/en/adminify.php', lang_path('en/adminify.php'));
        (new Filesystem)->ensureDirectoryExists(lang_path('el'));
        copy(__DIR__.'/../../stubs/lang/el/adminify.php', lang_path('el/adminify.php'));

        return $this;
    }

    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }

    protected function addRoutesToAppBootstrap(): static
    {
        $this->replaceInFile("health: '/up',",
            "health: '/up',
               then: function (\$router) {
            Route::localized(function () {
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            });
        }
        ", base_path('bootstrap/app.php')
        );

        return $this;
    }

    protected function installNodeDependencies(): void
    {

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
                '@ckeditor/ckeditor5-alignment' => '^37.0.1',
                '@ckeditor/ckeditor5-paragraph' => '^37.0.1',
                '@ckeditor/ckeditor5-paste-from-office' => '^37.0.1',
                '@ckeditor/ckeditor5-table' => '^37.0.1',
                '@ckeditor/ckeditor5-theme-lark' => '^37.0.1',
                '@ckeditor/ckeditor5-typing' => '^37.0.1',
                '@ckeditor/ckeditor5-upload' => '^37.0.1',
                '@ckeditor/vite-plugin-ckeditor5' => '^0.1.1',
                'toastify-js' => '^1.12.0',
                'chart.js' => '^4.4.0',
                'chartjs-chart-geo' => '^4.2.7',
                'flatpickr' => '^4.6.13',
                'flowbite' => '^1.6.3',
                'moment' => '^2.29.4',
                'lodash' => '*',
                'filepond' => '^4.30.4',
                'filepond-plugin-file-metadata' => '^1.0.8',
                'filepond-plugin-file-poster' => '^2.5.1',
                'filepond-plugin-image-preview' => '^4.6.11',
            ] + $packages;
        }, false);
    }

    protected function updateNodePackages(callable $callback, $dev = true): void
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
        $this->bar->advance();

    }

    public function installControllers(): static
    {
        //Controllers
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Admin/Adminify'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Controllers', app_path('Http/Controllers/Admin/Adminify'));

        $this->bar->advance();

        return $this;
    }

    public function installTraits(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Traits'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Traits', app_path('Traits'));
        $this->bar->advance();

        return $this;
    }

    public function installServiceClasses(): static
    {
        //Services
        (new Filesystem)->ensureDirectoryExists(app_path('Services'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Services', app_path('Services'));
        $this->bar->advance();

        return $this;
    }

    public function installValidationRules(): static
    {
        //Rules
        (new Filesystem)->ensureDirectoryExists(app_path('Rules'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Rules', app_path('Rules'));
        $this->bar->advance();

        return $this;
    }

    public function installModels(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Models'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Models', app_path('Models'));

        $this->bar->advance();

        return $this;
    }

    public function installMailables(): static
    {
        (new Filesystem())->ensureDirectoryExists(app_path('Mail'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Mail', app_path('Mail'));

        return $this;
    }

    public function installRequests(): static
    {
        //Requests
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Requests', app_path('Http/Requests/Admin/Adminify'));
        $this->bar->advance();

        return $this;
    }

    public function publishConstants(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Constants'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Constants', app_path('Constants'));
        $this->bar->advance();

        return $this;
    }

    public function installPolicies(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Policies'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Policies', app_path('Policies'));
        $this->bar->advance();

        return $this;
    }

    public function installFrontEndResources(): static
    {
        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path());
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources', resource_path());

        //App-folder-views
        (new Filesystem)->ensureDirectoryExists(app_path('View'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/View', app_path('View'));

        //Javascript Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js', resource_path('js'));

        //CSS Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/css', resource_path('css'));

        copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/vite.config.js', base_path('vite.config.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('images'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/images', resource_path('images'));
        $this->bar->advance();

        return $this;
    }

    public function installProviders(): static
    {
        //Providers
        copy(__DIR__.'/../../stubs/app/Providers/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));

        $this->bar->advance();

        return $this;
    }

    public function installSettings(): static
    {
        (new Filesystem)->ensureDirectoryExists(storage_path('app/analytics'));
        //Settings json file
        (new Filesystem)->ensureDirectoryExists(storage_path('app/settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/storage/app/settings', storage_path('app/settings'));
        $this->bar->advance();

        return $this;
    }

    public function copyMiddlewareClasses(): static
    {
        //Middleware Files...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));

        copy(__DIR__.'/../../stubs/app/Http/Middleware/RegistrationEnabled.php', app_path('Http/Middleware/RegistrationEnabled.php'));
        copy(__DIR__.'/../../stubs/app/Http/Middleware/CanAccessDashboard.php', app_path('Http/Middleware/CanAccessDashboard.php'));
        $this->bar->advance();

        return $this;
    }

    public function addMiddlewareToHttpKernel(): static
    {
        $this->installMiddlewareAliases([
            'registration.setting' => '\App\Http\Middleware\RegistrationEnabled::class',
            'canAccessDashboard' => '\App\Http\Middleware\CanAccessDashboard::class',
        ]);

        $this->bar->advance();

        return $this;
    }

    protected function installMiddleware($names, $group = 'web', $modifier = 'append')
    {
        $bootstrapApp = file_get_contents(base_path('bootstrap/app.php'));

        $names = collect(Arr::wrap($names))
            ->filter(fn ($name) => ! Str::contains($bootstrapApp, $name))
            ->whenNotEmpty(function ($names) use ($bootstrapApp, $group, $modifier) {
                $names = $names->map(fn ($name) => "$name")->implode(','.PHP_EOL.'            ');

                $bootstrapApp = str_replace(
                    '->withMiddleware(function (Middleware $middleware) {',
                    '->withMiddleware(function (Middleware $middleware) {'
                    .PHP_EOL."        \$middleware->$group($modifier: ["
                    .PHP_EOL."            $names,"
                    .PHP_EOL.'        ]);'
                    .PHP_EOL,
                    $bootstrapApp,
                );

                file_put_contents(base_path('bootstrap/app.php'), $bootstrapApp);
            });
    }

    protected function installMiddlewareAliases($aliases)
    {
        $bootstrapApp = file_get_contents(base_path('bootstrap/app.php'));

        $aliases = collect($aliases)
            ->filter(fn ($alias) => ! Str::contains($bootstrapApp, $alias))
            ->whenNotEmpty(function ($aliases) use ($bootstrapApp) {
                $aliases = $aliases->map(fn ($name, $alias) => "'$alias' => $name")->implode(','.PHP_EOL.'            ');

                $bootstrapApp = str_replace(
                    '->withMiddleware(function (Middleware $middleware) {',
                    '->withMiddleware(function (Middleware $middleware) {'
                    .PHP_EOL.'        $middleware->alias(['
                    .PHP_EOL."            $aliases,"
                    .PHP_EOL.'        ]);'
                    .PHP_EOL,
                    $bootstrapApp,
                );

                file_put_contents(base_path('bootstrap/app.php'), $bootstrapApp);
            });
    }

    public function addRegisterMiddlewareToBreezeRoutes(): static
    {
        $route1 = " Route::get('register', [RegisteredUserController::class, 'create'])";
        $route2 = "Route::post('register', [RegisteredUserController::class, 'store'])";
        $middlewareCode = "->middleware('registration.setting')";
        if (! Str::contains($route1, $middlewareCode)) {
            $this->replaceInFile($route1, $route1.$middlewareCode, base_path('routes/auth.php'));
        }

        if (! Str::contains($route2, $middlewareCode)) {
            $this->replaceInFile($route2, $route2.$middlewareCode, base_path('routes/auth.php'));
        }
        $this->bar->advance();

        return $this;
    }

    public function installRoutesFile(): static
    {
        //Routes
        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        copy(__DIR__.'/../../stubs/routes/adminify.php', base_path('routes/adminify.php'));

        File::put(base_path('routes/web.php'), '<?php'.PHP_EOL.
            "use Illuminate\Support\Facades\Route;".PHP_EOL.
            "use App\Models\Adminify\Post;".PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL.
            "   Route::get('/', function () { ".PHP_EOL.
            "       return view('welcome', [".PHP_EOL.
            "           'posts' => Post::withTranslation()".PHP_EOL.
            "                  ->with(['categories.translations', 'tags.translations', 'media'])".PHP_EOL.
            '               ->latest()'.PHP_EOL.
            '               ->limit(3)'.PHP_EOL.
            '               ->get()'.PHP_EOL.
            '   ]);'.PHP_EOL.
            '});'.PHP_EOL.PHP_EOL.
            "require __DIR__ . '/adminify.php';".PHP_EOL.
            "require __DIR__ . '/auth.php';".PHP_EOL
        );
        $this->bar->advance();

        return $this;
    }

    public function addValuesToEnvFiles(array $additionalEnvValues = []): static
    {
        $fields = array_merge(
            [
                PHP_EOL.'GOOGLE_ANALYTICS_PROPERTY_ID='.PHP_EOL,
                'GOOGLE_SERVICE_ACCOUNT_CREDENTIALS='.PHP_EOL,
                PHP_EOL.'RECAPTCHA_SITE_KEY='.PHP_EOL,
                'RECAPTCHA_SECRET_KEY='.PHP_EOL,
                'RECAPTCHA_SKIP_IP='.PHP_EOL,
            ], $additionalEnvValues);

        if (file_exists(base_path('.env'))) {
            $envContent = file_get_contents(base_path('.env'));
            foreach ($fields as $field) {
                if (! str_contains($envContent, $field)) {
                    file_put_contents('.env', $field, FILE_APPEND);
                }
            }
        }

        if (file_exists(base_path('.env.example'))) {
            $envContent = file_get_contents(base_path('.env.example'));
            foreach ($fields as $field) {
                if (! str_contains($envContent, $field)) {
                    file_put_contents('.env.example', $field, FILE_APPEND);
                }
            }
        }

        return $this;
    }

    public function replaceAppConfigFile(): static
    {

        $this->replaceInFile('locale =>', "'locale' => Valuestore::make(storage_path('app/settings/settings.json'))->get('default_locale'),", config_path('app.php'));
        $this->replaceInFile('fallback_locale =>', "'fallback_locale' => Valuestore::make(storage_path('app/settings/settings.json'))->get('fallback_locale'),", config_path('app.php'));

        $this->bar->advance();

        return $this;
    }

    public function execShellCommand($command): void
    {
        $output = [];
        $exitCode = 0;

        exec($command.' 2>&1', $output, $exitCode);

        if ($exitCode == 0) {
            // command was successful, do not print the output
        } else {
            $this->error('Command failed with exit code: '.$exitCode.PHP_EOL);
            $this->error('Error log: '.PHP_EOL);
            foreach ($output as $line) {
                $this->error($line.PHP_EOL);
            }
        }
        $this->bar->advance();
    }
}
