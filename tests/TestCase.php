<?php

namespace Nalcom\Adminify\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nalcom\Adminify\AdminifyServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use WithWorkbench;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Nalcom\\Adminify\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    public function defineRoutes($router)
    {
        require 'C:\DEV\Web\laravel-packages\adminify\stubs\routes\adminify.php';
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_adminify_table.php.stub';
        $migration->up();

    }

    protected function getPackageProviders($app)
    {
        return [
            AdminifyServiceProvider::class,
        ];
    }
}
