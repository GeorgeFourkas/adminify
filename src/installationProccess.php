<?php

namespace Nalcom\Adminify;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class installationProccess
{
    protected const ROUTE_MIDDLEWARE_ARRAY = 'protected $middlewareAliases = [';

    protected Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function installControllers()
    {
        //Controllers
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Controllers', app_path('Http/Controllers/Adminify'));

        return $this;
    }

    public function installTraits()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Traits'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Traits', app_path('Traits'));

        return $this;
    }

    public function installServiceClasses()
    {
        //Services
        (new Filesystem)->ensureDirectoryExists(app_path('Services'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Services', app_path('Services'));

        return $this;
    }

    public function installValidationRules()
    {
        //Rules
        (new Filesystem)->ensureDirectoryExists(app_path('Rules'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Rules', app_path('Rules'));

        return $this;
    }

    public function installModels()
    {
        //Requests
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Requests', app_path('Http/Requests'));

        return $this;
    }

    public function installPolicies()
    {
        //Policies
        (new Filesystem)->ensureDirectoryExists(app_path('Policies'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Policies', app_path('Policies'));

        return $this;
    }

    public function installFrontEndResources()
    {

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views', resource_path('views'));

        //Javascript Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js', resource_path('js'));

        //CSS Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/css', resource_path('css'));

        copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/vite.config.js', base_path('vite.config.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('images/admin'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/images/admin', resource_path('images/admin'));

        return $this;
    }

    public function installProviders()
    {
        //Providers
        copy(__DIR__.'/../../stubs/app/Providers/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));
        copy(__DIR__.'/../../stubs/app/Providers/RouteServiceProvider.php', app_path('Providers/RouteServiceProvider.php'));

        return $this;
    }

    public function installSettings()
    {
        //Settings json file
        (new Filesystem)->ensureDirectoryExists(storage_path('app/settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/storage/app/settings', storage_path('app/settings'));

        return $this;
    }

    public function installMiddleware()
    {
        //Middleware Files...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));
        copy(__DIR__.'/../../stubs/app/Http/Middleware/Language.php', app_path('Http/Middleware/Language.php'));

        return $this;
    }

    public function addMiddlewareToHttpKernel()
    {
        $kernelContent = file_get_contents(app_path('Http/Kernel.php'));
        if (! Str::contains($kernelContent, "'adminify.locale' =>")) {
            $this->replaceInFile(self::ROUTE_MIDDLEWARE_ARRAY,
                self::ROUTE_MIDDLEWARE_ARRAY.PHP_EOL.
                '        //This Middleware is responsible for handling the internationalized routes'.PHP_EOL.
                "        'adminify.locale' =>  \App\Http\Middleware\Language::class,", app_path('Http/Kernel.php'));

        }

        return $this;
    }

    public function installRoutesFile()
    {
        //Routes
        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        copy(__DIR__.'/../../stubs/routes/adminify.php', base_path('routes/adminify.php'));
        File::put(base_path('routes/web.php'), '<?php'.PHP_EOL.
            "require __DIR__ . '/adminify.php';".PHP_EOL.
            "require __DIR__ . '/auth.php';".PHP_EOL
        );

        return $this;
    }

    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
