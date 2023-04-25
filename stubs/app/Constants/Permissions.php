<?php

namespace App\Constants;

class Permissions
{
    //    Posts Permissions
    public const CREATE_POSTS = 'create-posts';

    public const READ_POSTS = 'read-posts';

    public const UPDATE_POSTS = 'update-posts';

    public const DELETE_POSTS = 'delete-posts';

    //    Users Permissions
    public const CREATE_USERS = 'create-users';

    public const READ_USERS = 'read-users';

    public const UPDATE_USERS = 'update-users';

    public const DELETE_USERS = 'delete-users';

    public const UPDATE_USERS_PASSWORDS = 'updates-users-password';

    //Comments
    public const APPROVE_COMMENTS = 'approve-comments';

    public const DELETE_COMMENTS = 'delete-comments';

    //Settings
    public const READ_SETTINGS = 'read-settings';

    public const CHANGE_SETTINGS = 'change-settings';

    //Categories
    public const CREATE_CATEGORIES = 'create-categories';

    public const UPDATE_CATEGORIES = 'update-categories';

    public const DELETE_CATEGORIES = 'delete-categories';

    //Tags
    public const CREATE_TAGS = 'create-tags';

    public const UPDATE_TAGS = 'update-tags';

    public const DELETE_TAGS = 'delete-tags';
}
