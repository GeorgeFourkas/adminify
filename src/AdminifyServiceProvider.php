<?php

namespace Nalcom\Adminify;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nalcom\Adminify\Commands\AdminifyCommand;

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
