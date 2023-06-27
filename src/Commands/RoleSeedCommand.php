<?php

namespace Nalcom\Adminify\Commands;

use App\Traits\SeedsRoles;
use Illuminate\Console\Command;

class RoleSeedCommand extends Command
{
    use SeedsRoles;

    protected $signature = 'roles:init';

    protected $description = 'this command initializes roles and permissions';

    public function handle(): int
    {
        $this->initializeRoles();

        $this->createAdministrator();

        $this->info('Roles and permissions created successfully');

        return self::SUCCESS;
    }
}
