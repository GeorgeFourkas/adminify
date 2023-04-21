<?php

namespace Nalcom\Adminify;

use Nalcom\Adminify\Commands\AdminifyCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('adminify')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_adminify_table')
            ->hasCommand(AdminifyCommand::class);
    }
}
