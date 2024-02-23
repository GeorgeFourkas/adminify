<?php

return [
    /*
     *  Here you can find all the texts that are displayed by the adminify package.
     * Also it includes the texts from the overridden Laravel Breeze Blade view.
     *
     */
    'dashboard' => [
        'cards' => [
            ['title' => 'online users'],
            ['title' => 'weekly visitors'],
            ['title' => 'average session time'],
            ['title' => 'total posts'],
        ],

        'hero' => [
            'upper_text' => 'administration',
            'title' => 'nalcom administration panel',
            'description' => 'Whenever visitors are online on the website a doughnut chart will appear containing the device types',
            'no_data' => 'No data currently available',
        ],

        'documentation' => [
            'upper_text' => 'Work done flawlessly',
            'description' => 'Do you have any questions about the use of the administration panel?',
            'link' => 'Read the quickstart guide',
        ],

        'charts' => [
            ['title' => 'website visitor sources'],
            ['title' => 'traffic overview'],
            ['title' => 'page views in 2 months'],
            ['title' => 'visitors by country'],
        ],
    ],

    'categories' => [
        'page_title' => 'categories',
        'add_category_button' => 'add category',
        'category_title_input' => 'name',
        'category_parent_id' => 'parent category',

    ],

    'media' => [
        'page_title' => 'Media',
        'upload_action' => 'upload media',
        'action_button' => 'Upload',
        'no_media_available' => 'No Media Currently Uploaded',
        'uploaded_by' => 'uploaded by',
        'uploaded_at' => 'uploaded at',
        'original_file_name' => 'original file name',
        'file_extension' => 'file extension',
        'file_size' => 'file size',
        'aspect_ratio' => 'aspect ratio',
        'width' => 'width',
        'height' => 'height',
        'file_url' => 'file url',
        'remove_btn' => 'remove',
        'chooser' => 'choose media',
    ],

    'settings' => [
        'page_title' => 'website settings',
        'page_description' => "Here you can manage your website's settings regarding the overall behaviour",
        'features_title' => 'Website Features',
        'features_description' => 'Enable or disable certain website features such as Comments, and user registration',
        'registration' => 'user registration',
        'registration_description' => 'Allow website visitors to register to this website?',
        'enable_comments' => 'enable comments on posts',
        'enable_comments_description' => 'Allow website visitors to leave comment on your posts',
        'enable_user_comments' => 'Enable unregistered users to add comments',
        'enable_user_comments_description' => 'Allow users that are not authenticated or even registered to add comments to your posts',
        'localization' => 'localization',
        'localization_description' => 'Add or remove languages to your website including your posts and users.',
        'default_language' => 'Default Language',
        'make_default_lang_text' => 'Set Default Language',
        'add_language_text' => 'add translation',
        'json_file_upload' => 'Google Analytics Credentials JSON File',
        'json_file_upload_description' => 'This JSON file contains the authentication credentials to access Google Analytics API.',
        'json_file_upload_btn' => 'upload json file',
        'json_warning_text' => 'Your website already has an uploaded credentials file',
        'roles_permissions' => 'roles & permissions',
        'roles_permissions_description' => 'Manage what permission each role of user has access to on the website',
        'progress' => 'Hold on! This might take some time',
        'lang_status' => 'language status',
        'publish_lang' => 'publish language?',
        'set_default_lang' => 'set default language',
        'locale_change' => 'Successfully changed locale settings',
        'manage_translations' => 'Manage Translations',
    ],

    'tags' => [
        'page_title' => 'tags',
        'action_button_text' => 'create tag',
        'name_column' => 'name',
        'created_at_column' => 'created at',
        'create_tag_modal_title' => 'Create Tag',
        'edit_tag_modal_title' => 'Edit Tag',
        'tag_name_field' => 'tag name',
    ],

    'comments' => [
        'page_title' => 'comments',
        'comment_column' => 'comment',
        'author_column' => 'author',
        'post_column' => 'post',
        'approved_column' => 'approved',
        'uploaded_column' => 'created at',
    ],

    'users' => [
        'page_title' => 'users',
        'action_button' => 'create user',
        'email' => 'email',
        'password' => 'password',
        'password_confirmation' => 'confirm password',
        'user_profile_photo' => 'User Profile Photo',
        'name' => 'name',
        'role' => 'role',
        'new_password' => 'new password',
        'registered_at' => 'registered at',
        'update_password' => 'update password',
    ],

    'menu' => [
        'dashboard' => 'dashboard',
        'posts' => 'posts',
        'users' => 'users',
        'comments' => 'comments',
        'media' => 'media',
        'tags' => 'tags',
        'categories' => 'categories',
        'settings' => 'settings',
        'separator_1' => 'taxonomies',
        'separator_2' => 'website settings',
    ],
    'registration' => [
        'title' => 'Create New Account',
        'subtitle' => 'Fill in the required credentials to create your account',
        'fields' => [
            'full_name' => 'full name',
            'email' => 'email',
            'password' => 'password',
            'password_confirmation' => 'confirm password',
            'already_registered' => 'already registered?',
        ],
    ],
    'forgot_pwd' => [
        'title' => 'forgot password?',
        'subtitle' => "No worries. We'll send reset instructions.",
        'email' => 'email',
        'send' => 'send reset link',
    ],

    'reset_pwd' => [
        'title' => 'reset your password',
        'subtitle' => 'Fill the form to reset your password.',
        'new_password' => 'new password',
        'confirm_new_password' => 'new password confirmation',
        'success' => 'A new verification link has been sent to the email address you provided during registration.',
    ],
    'email_verification' => [
        'title' => 'heads up!',
        'description' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
        'success' => 'A new verification link has been sent to the email address you provided during registration.',
        'button' => 'resend email verification link',
        'logout' => 'log out',
    ],
    'errors' => [
        'category_same_as_parent' => "Parent category can't be the same",
        'category_name_required' => "Category's name in main locale is required",
    ],

    'create_post' => 'create post',
    'post_title' => 'title',
    'post_created_at' => 'post created at',
    'post_create_new_category' => 'create new category',
    'post_author' => 'author',
    'post_status' => 'status',
    'post_body' => 'post body',
    'post_featured_image' => 'post featured image',
    'post_meta_tag_name' => 'Meta Tag Name',
    'post_meta_tag_value' => 'Meta Tag Value',
    'post_add_meta_action_button_text' => 'Add Field',
    'create_new_category_trigger' => 'or, create  new category',
    'create_new_category_modal' => 'create new category',
    'deletion_confirmation' => 'Delete Confirmation',
    'are_you_sure' => 'Are you sure you want to delete this record?',
    'action_warning' => 'The action cannot be undone, deletion will be permanent',
    'affirmative' => "Yes, I'm sure",
    'negative' => 'No, cancel',
    'published' => 'published',
    'publish' => 'publish',
    'default' => 'default',
    'submit' => 'submit',
    'warning' => 'warning',
    'update' => 'update',
    'unpublished' => 'unpublished',
    'approved' => 'approved',
    'comment' => 'comment',
    'welcome_back' => 'welcome back',
    'login_description' => 'Enter your email and password to sign in',
    'remember' => 'remember me',
    'lost_password' => 'forgot your password?',
    'no_account' => "Don't you have an account? Register",
    'login' => 'login',
    'not_translated' => 'translation not set',
    'category_update' => 'Category updated successfully',
    'category_create' => 'Category created successfully',
    'category_delete' => 'Category Deleted Successfully',
    'comment_update' => 'comment deleted successfully',
    'media_upload' => 'Media uploaded successfully',
    'media_delete' => 'Media deleted successfully',
    'post_create' => 'Post created successfully',
    'post_update' => 'Post updated successfully',
    'post_delete' => 'Post deleted successfully',
    'permissions_alter' => 'Permission changes saved successfully',
    'analytics_json_success' => 'File Saved Successfully. Update the .env value for the change to take effect.',
    'settings_sync' => 'Settings synced successfully',
    'language_added' => 'Successfully added to translations list',
    'locale_changed' => 'Default locale changed',
    'language_removed' => 'successfully removed from translations list',
    'tag_create' => 'Tag Created Successfully',
    'tag_update' => 'Tag Updated Successfully',
    'tag_delete' => 'Tag Delete Successfully',
    'user_create' => 'User created successfully',
    'user_password_update' => 'Successfully updated user\'s password',
    'user_update' => 'Successfully updated user',
    'user_delete' => 'User Deleted Successfully',
    'translations_stored' => 'Successfully Stored Translations',
    'to' => 'to',
    'choose_already_uploaded' => 'Choose an already uploaded file',
    'logout' => 'logout',
];
