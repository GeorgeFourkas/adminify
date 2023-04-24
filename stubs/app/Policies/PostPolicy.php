<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\Adminify\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Post $post)
    {
        //
    }

    public function create(User $user): Response|bool
    {
        return $user->can(Permissions::CREATE_POSTS);

    }

    public function update(User $user, Post $post)
    {
        return $user->can(Permissions::UPDATE_POSTS);
    }

    public function delete(User $user, Post $post)
    {
        return $user->can(Permissions::DELETE_POSTS);
    }
}
