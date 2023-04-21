<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $user->can(Permissions::READ_USERS);
    }

    public function create(User $user): Response|bool
    {
        return $user->can(Permissions::CREATE_USERS);
    }

    public function update(User $user)
    {
        return $user->can(Permissions::UPDATE_USERS);
    }

    public function delete(User $user): bool
    {
        return $user->can(Permissions::DELETE_USERS);
    }
}
