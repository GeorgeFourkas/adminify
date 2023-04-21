<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Traits\Multilingual;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Locale;
use ResourceBundle;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use Multilingual;

    public function index()
    {
        return view('admin.dashboard', [
            'posts_count' => Post::count(),
            'published_languages' => $this->getPublishedLanguages(),
        ]);
    }

    public function posts()
    {
        return view('admin.posts.index', [
            'posts' => Post::with(['user.roles', 'comments', 'translation'])
                ->latest()
                ->paginate(20),
        ]);
    }

    public function comments()
    {
        return view('admin.comments.index', [
            'comments' => Comment::with(['post', 'user.roles'])
                ->paginate(),
        ]);
    }

    public function settings()
    {
        $languages = collect($this->getStore()->get('locales'));

        return view('admin.settings', [
            'settings' => $this->getStore()->all(),
            'grouped' => $this->orderPermissionsByModelOperations(),
            'permissions' => Permission::all('name'),
            'published_languages' => $this->getPublishedLanguages(),
            'available_languages' => $this->getWorldLanguages(),
            'credentials_dir_is_empty' => $this->directoryIsEmpty(storage_path('app/analytics')),
            'languages' => $languages->each(function ($item, $key) use (&$languages) {
                if ($key === $this->getStore()->get('default_locale')) {
                    $languages->forget($key);
                    $languages->prepend($item, $key);
                }
            }),
            'roles' => Role::with('permissions')
                ->where('name', '!=', 'administrator')
                ->get(),
        ]);
    }

    public function users()
    {
        return view('admin.users.index', [
            'users' => User::with('roles')->paginate(),
        ]);
    }

    public function media()
    {
        return view('admin.media', [
            'media' => Media::with('uploader:id,name')->latest()->paginate(49),
        ]);
    }

    public function tags()
    {
        return view('admin.tags', [
            'tags' => Tag::with('translations')->paginate(22),
            'locales' => $this->getAllDeclaredLanguages(),
        ]);
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::with(['translation', 'translations'])->tree()->get(),
        ]);
    }

    private function orderPermissionsByModelOperations()
    {
        $grouped = [];
        $permissions = Permission::all();
        foreach ($permissions as $perm) {
            $segments = explode('-', $perm->name);
            $model = end($segments);
            if (str_contains($perm->name, $model) || str_contains($perm->name, $model.'s')) {
                $grouped[$model][] = $perm->name;
            }
        }

        return $grouped;
    }

    private function getWorldLanguages()
    {
        $languages = [];

        foreach (ResourceBundle::getLocales('') as $locale) {
            $languages[$locale] = Locale::getDisplayLanguage($locale, App::getLocale());
        }
        $languages = (array_unique($languages));
        foreach (array_keys($this->getStore()->get('locales')) as $selectedLocale) {
            if (isset($languages[$selectedLocale])) {
                unset($languages[$selectedLocale]);
            }
        }

        return $languages;
    }

    private function directoryIsEmpty($directory)
    {
        return File::exists($directory) && File::isDirectory($directory) && (count(File::allFiles($directory)) == 0);
    }
}
