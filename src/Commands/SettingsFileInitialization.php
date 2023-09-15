<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SettingsFileInitialization extends Command
{
    protected $signature = 'settings:init';

    protected $description = 'This command initializes the settings file';

    public function handle(): int
    {

        $additional = config('adminify.settings');
        if (! $additional) {
            $additional = [];
        }

        Storage::put('settings/settings.json', json_encode(
            [
                'comments_enabled' => false,
                'registration_enabled' => false,
                'unregistered_users_can_comment' => false,
                'locales' => [
                    'en' => [
                        'published',
                    ],
                    'el' => [
                        'published',
                    ],
                ],
                'deposit' => '30',
                'default_locale' => 'en',
            ]
            + $additional
        ));

        $this->info('Settings Initialized successfully');

        return self::SUCCESS;
    }
}
