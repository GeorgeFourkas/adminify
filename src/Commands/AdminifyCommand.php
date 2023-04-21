<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;

class AdminifyCommand extends Command
{
    public $signature = 'adminify';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
