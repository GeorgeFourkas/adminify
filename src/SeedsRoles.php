<?php

namespace Nalcom\Adminify;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

trait SeedsRoles
{
    protected $roles = [
        '',
    ];

    public function initializeRoles()
    {
        $permissions = [];
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        if (Role::where('name', 'contributor')->doesntExist()) {
            $role = Role::create(['name' => 'contributor']);
            $permissions[] = Permission::create(['name' => Permissions::READ_POSTS]);
            $role->givePermissionTo($permissions);
        }
        if (Role::where('name', 'author')->doesntExist()) {
            $role = Role::create(['name' => 'author']);
            $permissions[] = Permission::create(['name' => Permissions::CREATE_POSTS]);
            $permissions[] = Permission::create(['name' => Permissions::UPDATE_POSTS]);
            $permissions[] = Permission::create(['name' => Permissions::DELETE_POSTS]);
            $role->givePermissionTo($permissions);
        }
        if (Role::where('name', 'moderator')->doesntExist()) {
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
        }
        if (Role::where('name', 'administrator')->doesntExist()) {
            $role = Role::create(['name' => 'administrator']);

            $permissions[] = Permission::create(['name' => Permissions::DELETE_USERS]);
            $permissions[] = Permission::create(['name' => Permissions::CHANGE_SETTINGS]);
            $permissions[] = Permission::create(['name' => Permissions::UPDATE_USERS_PASSWORDS]);

            $role->givePermissionTo($permissions);
        }

        $this->info(PHP_EOL);
        $this->info('All Roles and permissions are up!');
    }

    public function createAdministrator($email, $name = 'Nalcom Administrator'): void
    {
        User::firstOrCreate(
            [
                'email' => $email,
            ],
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('123456789'),
            ]
        )->assignRole('administrator');

        $this->info('Creating administrator with email '.$email);
    }
}
