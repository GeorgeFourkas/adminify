<?php

namespace Nalcom\Adminify\Commands;

use Illuminate\Console\Command;
use Nalcom\Adminify\SeedsRoles;

class RoleSeedCommand extends Command
{
    use SeedsRoles;

    protected $signature = 'roles:init';

    protected $description = 'intializes db';

    public function handle(): void
    {
        $this->initializeRoles();

        $this->createAdministrator('admin@nalom.gr');
    }
}
