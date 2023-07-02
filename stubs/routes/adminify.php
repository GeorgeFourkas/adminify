<?php

use App\Http\Controllers\Admin\Adminify\AdminController;
use App\Http\Controllers\Admin\Adminify\AnalyticsController;
use App\Http\Controllers\Admin\Adminify\CategoryController;
use App\Http\Controllers\Admin\Adminify\CommentController;
use App\Http\Controllers\Admin\Adminify\JsonCredentialsAnalyticsController;
use App\Http\Controllers\Admin\Adminify\LanguageController;
use App\Http\Controllers\Admin\Adminify\LiveAnalyticsController;
use App\Http\Controllers\Admin\Adminify\MediaController;
use App\Http\Controllers\Admin\Adminify\PermissionController;
use App\Http\Controllers\Admin\Adminify\PostController;
use App\Http\Controllers\Admin\Adminify\SettingsController;
use App\Http\Controllers\Admin\Adminify\TagController;
use App\Http\Controllers\Admin\Adminify\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(AnalyticsController::class)->group(function () {
        Route::prefix('/analytics')->group(function () {
            Route::get('/sources', 'sources')
                ->name('analytics.sources');
            Route::get('traffic', 'traffic')
                ->name('analytics.traffic');
            Route::get('users/today', 'totalUsersYesterday')
                ->name('analytics.users.today');
            Route::get('/average/session/time', 'averageSessionTime')
                ->name('average.session.time');
            Route::get('recent/views/', 'mostViewedPages')
                ->name('analytics.get.recent.events');
            Route::get('map', 'countries')
                ->name('analytics.map');
            Route::get('batch', 'batch')
                ->name('analytics.batch');
        });
    });

    Route::prefix('/tags')->group(function () {
        Route::controller(TagController::class)->group(function () {
            Route::get('/search', 'show')
                ->name('tags.search');
            Route::post('/store', 'store')
                ->name('tags.store');
            Route::post('/update/{tag}', 'update')
                ->name('tags.update');
            Route::delete('destroy/{tag}', 'destroy')
                ->name('tags.delete');
        });
    });

    Route::get('analytics/real-time', LiveAnalyticsController::class)
        ->name('live.analytics');

    Route::prefix('/master/admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard', 'index')
                ->name('dashboard');
            Route::get('/comments', 'comments')
                ->name('comments');
            Route::get('/posts', 'posts')
                ->name('posts');
            Route::get('/users', 'users')
                ->name('users');
            Route::get('/projects', 'projects')
                ->name('projects');
            Route::get('/media', 'media')
                ->name('media');
            Route::get('/settings', 'settings')
                ->name('settings');
            Route::get('/tags', 'tags')
                ->name('tags');
            Route::get('/categories', 'categories')
                ->name('categories');
        });

        Route::controller(MediaController::class)->prefix('/media')->group(function () {
            Route::get('/get', 'show');
            Route::post('/upload', 'store');
            Route::post('/new/upload', 'upload')
                ->name('upload.new.media');
            Route::delete('/delete/{media}', 'destroy')
                ->name('media.destroy');
        });

        Route::controller(PostController::class)->group(function () {
            Route::get('/posts/create', 'create')
                ->name('posts.create');
            Route::post('/post/save', 'store')
                ->name('posts.save');
            Route::get('/post/{post}/edit', 'edit')
                ->name('posts.edit');
            Route::post('/post/{post}/update', 'update')
                ->name('posts.update');
            Route::delete('/post/{post}/destroy', 'delete')
                ->name('posts.delete');
            Route::post('/post/search/', [PostController::class, 'search'])
                ->name('posts.search');
        });
        Route::prefix('/users')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('create', 'create')
                    ->name('user.create');
                Route::post('store', 'store')
                    ->name('user.store');
                Route::get('edit/{user}', 'edit')
                    ->name('user.edit');
                Route::post('update/{user}', 'update')
                    ->name('user.update');
                Route::delete('destroy/{user}', 'destroy')
                    ->name('user.delete');
                Route::put('/password/update/{user}', 'passwordUpdate')
                    ->name('user.password.update');
            });
        });

        Route::prefix('categories')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::post('/store', 'store')
                    ->name('categories.store');
                Route::post('/update/{category}', 'update')
                    ->name('categories.update');
                Route::delete('/destroy/{category}', 'destroy')
                    ->name('categories.destroy');
            });
        });

        Route::prefix('/comment')->group(function () {
            Route::controller(CommentController::class)->group(function () {
                Route::post('/approve/{comment}', 'approve')
                    ->name('comment.approve');
                Route::delete('/delete/{comment}', 'delete')
                    ->name('comment.delete');
                Route::post('/update', 'update')
                    ->name('comment.update');
            });
        });
        Route::post('/permission/change/{role}', [PermissionController::class, 'alter'])
            ->name('permission.alter');

        Route::prefix('language')->group(function () {
            Route::controller(LanguageController::class)->group(function () {
                Route::post('/switch', 'switch')
                    ->name('language.switch');
            });
        });

        Route::prefix('/settings')->group(function () {
            Route::post('/features/store', [SettingsController::class, 'sync'])
                ->name('settings.features');
            Route::delete('/language/delete', [SettingsController::class, 'removeLanguage'])
                ->name('language.delete');
            Route::post('/language/new', [SettingsController::class, 'addLanguage'])
                ->name('language.add');
            Route::post('/language/change/default', [SettingsController::class, 'changeDefaultLanguage'])
                ->name('language.change.default');
            Route::post('/language/change/status', [LanguageController::class, 'status'])
                ->name('language.status');
            Route::post('/analytics/credentials/store', JsonCredentialsAnalyticsController::class)
                ->name('json.credentials.store');
        });
    });
});
