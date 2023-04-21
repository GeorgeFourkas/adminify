<?php

namespace Nalcom\Adminify;

use Nalcom\Adminify\Commands\AdminifyCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('adminify')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_adminify_table')
            ->hasCommand(AdminifyCommand::class);
    }
}
