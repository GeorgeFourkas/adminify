<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Models\Adminify\Category;
use App\Models\Adminify\Comment;
use App\Models\Adminify\Media;
use App\Models\Adminify\Post;
use App\Models\Adminify\Tag;
use App\Models\User;
use App\Traits\Multilingual;
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
            'users' => \DB::table('posts')->join('users', 'posts.id', '=', 'users.id')->select(['users.name', 'users.id'])->get(),
            'posts' => Post::withTranslation()
                ->with(['media', 'user.roles' => fn ($q) => $q->select('name')])
                ->when(request()->has('published'), fn ($q) => $q->where('published', request()->input('published')))
                ->when(request()->input('title'), fn ($q) => $q->whereTranslationLike('title', '%'.request()->input('title').'%'))
                ->when(request()->input('category'), fn ($q) => $q->whereHas('categories', function ($query) {
                    return $query->where('id', request()->input('category'));
                }))
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
            'users' => User::with(['roles' => function ($q) {
                return $q->select(['id', 'name']);
            }])->paginate(),
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
            'categories' => Category::withTranslation()
                ->tree()
                ->withCount('siblings')
                ->get(),
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
            $languages[$locale] = Locale::getDisplayLanguage($locale, app()->getLocale());
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
