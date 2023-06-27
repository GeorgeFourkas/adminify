<?php

namespace App\Traits;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

trait SeedsRoles
{

    public function initializeRoles()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'contributor']);
        $permissions[] = Permission::create(['name' => Permissions::READ_POSTS]);
        $role->givePermissionTo($permissions);
        $role = Role::create(['name' => 'author']);
        $permissions[] = Permission::create(['name' => Permissions::CREATE_POSTS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_POSTS]);
        $permissions[] = Permission::create(['name' => Permissions::DELETE_POSTS]);
        $role->givePermissionTo($permissions);
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

        $role = Role::create(['name' => 'administrator']);

        $permissions[] = Permission::create(['name' => Permissions::DELETE_USERS]);
        $permissions[] = Permission::create(['name' => Permissions::CHANGE_SETTINGS]);
        $permissions[] = Permission::create(['name' => Permissions::UPDATE_USERS_PASSWORDS]);
        $role->givePermissionTo($permissions);

    }

    public function createAdministrator(): void
    {
        User::firstOrCreate(
            [
                'email' => 'admin@nalcom.gr',
            ],
            [
                'name' => 'george fourkas',
                'email' => 'admin@nalcom.gr',
                'password' => Hash::make('123456789'),
            ]
        )->assignRole('administrator');
    }

}
