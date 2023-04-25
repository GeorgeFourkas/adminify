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
            ->hasMigrations([
                '2023_02_06_125056_create_posts_table',
                '2023_02_07_200913_create_post_translations_table',
                '2023_02_08_161306_create_comments_table',
                '2023_02_14_092339_create_permission_tables',
                '2023_02_14_130802_add_aprooved_column_and_change_user_id_to_nullable_on_comments_table',
                '2023_03_21_134541_create_media_table',
                '2023_03_21_134622_create_mediables_table',
                '2023_03_22_155025_create_tags_table',
                '2023_03_22_162657_create_taggables_table',
                '2023_03_22_165043_create_tag_translations_table',
                '2023_03_24_153626_create_categories_table',
                '2023_03_27_150634_create_category_translations_table',
                '2023_03_29_184020_create_categoryables_table',
            ])
            ->hasCommand(AdminifyCommand::class);
    }
}