<?php

namespace Nalcom\Adminify\Commands;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminifyCommand extends Command
{
    public $signature = 'adminify:install';

    public $description = 'Installs the nalcom adminify laravel package';

    protected const ROUTE_MIDDLEWARE_ARRAY = 'protected $middlewareAliases = [';

    public $bar;

    public function handle(): int
    {

        $this->info('Initializing Package Installation...');
        $this->bar = $this->output->createProgressBar(26);
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
            ->installRequests()
            ->installTraits()
            ->installServiceClasses()
            ->installValidationRules()
            ->installPolicies()
            ->installFrontEndResources()
            ->installProviders()
            ->installSettings()
            ->publishConstants()
            ->installMiddleware()
            ->addMiddlewareToHttpKernel()
            ->installRoutesFile()
            ->replaceAppConfigFile()
            ->addRegisterMiddlewareToBreezeRoutes();

        copy(__DIR__ . '/../../stubs/config/translatable.php', config_path('translatable.php'));
        $this->bar->advance();

        $this->callSilently('vendor:publish', [
            '--tag' => 'adminify-migrations',
        ]);
        $this->bar->advance();

        $this->callSilently('migrate:fresh');
        $this->bar->advance();

        $this->execShellCommand('npm install');
        $this->execShellCommand('npm run build');

        $this->bar->advance();
        $this->initializeRolesAndPermissions();
        $this->bar->advance();
        $this->bar->finish();
        $this->newLine()
            ->info("Successfully installed Adminify Package. Have fun using it!");

        return self::SUCCESS;
    }

    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }

    protected function installNodeDependencies()
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
                    'chart.js' => '^4.2.1',
                    'chartjs-chart-geo' => '^4.1.2',
                    'flatpickr' => '^4.6.13',
                    'flowbite' => '^1.6.3',
                    'google-charts' => '^2.0.0',
                    'micromodal' => '^0.4.10',
                    'moment' => '^2.29.4',
                    'typewriter-effect' => '^2.19.0',
                    'lodash' => '*',
                ] + $packages;
        });
    }

    protected function updateNodePackages(callable $callback, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
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
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
        $this->bar->advance();

    }

    public function installControllers(): static
    {
        //Controllers
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Http/Controllers', app_path('Http/Controllers/Adminify'));

        $this->bar->advance();

        return $this;
    }

    public function installTraits(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Traits'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Traits', app_path('Traits'));
        $this->bar->advance();

        return $this;
    }

    public function installServiceClasses(): static
    {
        //Services
        (new Filesystem)->ensureDirectoryExists(app_path('Services'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Services', app_path('Services'));
        $this->bar->advance();

        return $this;
    }

    public function installValidationRules(): static
    {
        //Rules
        (new Filesystem)->ensureDirectoryExists(app_path('Rules'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Rules', app_path('Rules'));
        $this->bar->advance();

        return $this;
    }

    public function installModels(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Models'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Models', app_path('Models'));
        $this->bar->advance();

        return $this;
    }

    public function installRequests(): static
    {
        //Requests
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Http/Requests', app_path('Http/Requests'));
        $this->bar->advance();

        return $this;
    }

    public function publishConstants(): static
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Constants'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Constants', app_path('Constants'));
        $this->bar->advance();

        return $this;
    }

    public function installPolicies(): static
    {

        (new Filesystem)->ensureDirectoryExists(app_path('Policies'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Policies', app_path('Policies'));
        $this->bar->advance();

        return $this;
    }

    public function installFrontEndResources(): static
    {

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path());
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources', resource_path());

        //App-folder-views
        (new Filesystem)->ensureDirectoryExists(app_path('View'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/View', app_path('View'));

        //Javascript Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/js', resource_path('js'));

        //CSS Files...
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/css', resource_path('css'));

        copy(__DIR__ . '/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/vite.config.js', base_path('vite.config.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('images'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/images', resource_path('images'));
        $this->bar->advance();

        return $this;
    }

    public function installProviders(): static
    {
        //Providers
        copy(__DIR__ . '/../../stubs/app/Providers/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));
        copy(__DIR__ . '/../../stubs/app/Providers/RouteServiceProvider.php', app_path('Providers/RouteServiceProvider.php'));
        $this->bar->advance();

        return $this;
    }

    public function installSettings(): static
    {
        (new Filesystem)->ensureDirectoryExists(storage_path('app/analytics'));
        //Settings json file
        (new Filesystem)->ensureDirectoryExists(storage_path('app/settings'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/storage/app/settings', storage_path('app/settings'));
        $this->bar->advance();

        return $this;
    }

    public function installMiddleware(): static
    {
        //Middleware Files...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));
        copy(__DIR__ . '/../../stubs/app/Http/Middleware/Language.php', app_path('Http/Middleware/Language.php'));
        copy(__DIR__ . '/../../stubs/app/Http/Middleware/RegistrationEnabled.php', app_path('Http/Middleware/RegistrationEnabled.php'));
        $this->bar->advance();

        return $this;
    }

    public function addMiddlewareToHttpKernel(): static
    {
        $kernelContent = file_get_contents(app_path('Http/Kernel.php'));
        if (!Str::contains($kernelContent, "'adminify.locale' =>")) {
            $this->replaceInFile(self::ROUTE_MIDDLEWARE_ARRAY,
                self::ROUTE_MIDDLEWARE_ARRAY . PHP_EOL .
                "        'adminify.locale' =>  \App\Http\Middleware\Language::class," . PHP_EOL,
                app_path('Http/Kernel.php'));
        }

        if (!Str::contains($kernelContent, "'registration.setting' =>")) {
            $this->replaceInFile(self::ROUTE_MIDDLEWARE_ARRAY,
                self::ROUTE_MIDDLEWARE_ARRAY . PHP_EOL .
                "        'registration.setting' =>  \App\Http\Middleware\RegistrationEnabled::class," . PHP_EOL,
                app_path('Http/Kernel.php'));
        }
        $this->bar->advance();

        return $this;
    }

    public function addRegisterMiddlewareToBreezeRoutes(): static
    {

        $route1 = " Route::get('register', [RegisteredUserController::class, 'create'])";
        $route2 = "Route::post('register', [RegisteredUserController::class, 'store'])";
        $middlewareCode = "->middleware('registration.setting')";
        if (!Str::contains($route1, $middlewareCode)) {
            $this->replaceInFile($route1, $route1 . $middlewareCode, base_path('routes/auth.php'));
        }

        if (!Str::contains($route2, $middlewareCode)) {
            $this->replaceInFile($route2, $route2 . $middlewareCode, base_path('routes/auth.php'));
        }
        $this->bar->advance();

        return $this;
    }

    public function installRoutesFile(): static
    {
        //Routes
        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        copy(__DIR__ . '/../../stubs/routes/adminify.php', base_path('routes/adminify.php'));
        File::put(base_path('routes/web.php'), '<?php' . PHP_EOL .
            "require __DIR__ . '/adminify.php';" . PHP_EOL .
            "require __DIR__ . '/auth.php';" . PHP_EOL
        );
        $this->bar->advance();

        return $this;
    }

    public function replaceAppConfigFile(): static
    {
        copy(__DIR__ . '/../../stubs/config/app.php', config_path('app.php'));
        $this->bar->advance();

        return $this;
    }


    public function execShellCommand($command)
    {
        $output = [];
        $exitCode = 0;

        exec($command . " 2>&1", $output, $exitCode);

        if ($exitCode == 0) {
            // command was successful, do not print the output
        } else {
            $this->error("Command failed with exit code: " . $exitCode . PHP_EOL);
            $this->error("Error log: " . PHP_EOL);
            foreach ($output as $line) {
                $this->error($line . PHP_EOL);
            }
        }

        $this->bar->advance();
    }


    protected function initializeRolesAndPermissions()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'contributor']);
        $permissions[] = Permission::create(['name' => Permissions::READ_POSTS]);
        $role->givePermissionTo($permissions);
        $role = Role::create(['name' => 'author']);
        $permissions[] = Permission::create(['name' => Permissions::CREATE_POSTS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_POSTS]);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_POSTS]);
        $role->givePermissionTo($permissions);
        $role = Role::create(['name' => 'moderator']);

        $permissions[] = Permission::create(['name' => Permissions::APPROVE_COMMENTS]);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_COMMENTS]);
        $permissions[] = Permission::create(['name' => Permissions::READ_SETTINGS]);
        $permissions[] = Permission::create(['name' => Permissions::READ_USERS]);
        $permissions[] = Permission::create(['name' => Permissions::CREATE_USERS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_USERS]);

        $permissions[] = Permission::create(['name' => Permissions::UPDATE_CATEGORIES]);
        $permissions[] = Permission::create(['name' => Permissions::CREATE_CATEGORIES]);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_CATEGORIES]);
        $permissions[] = Permission::create(['name' => Permissions::CREATE_TAGS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_TAGS]);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_TAGS]);
        $role->givePermissionTo($permissions);

        $role = Role::create(['name' => 'administrator']);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_USERS]);
        $permissions[] = Permission::create(['name' => Permissions::CHANGE_SETTINGS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_USERS_PASSWORDS]);
        $role->givePermissionTo($permissions);

        User::firstOrCreate(
            [
                'email' => 'giorgosfourkas.98@gmail.com',
            ],
            [
                'name' => 'george fourkas',
                'email' => 'giorgosfourkas.98@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        )->assignRole('administrator');
        $this->bar->advance();
    }
}
