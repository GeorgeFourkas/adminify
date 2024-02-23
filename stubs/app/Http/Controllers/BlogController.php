<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Models\Adminify\Category;
use App\Models\Adminify\Post;
use App\Traits\Multilingual;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use Multilingual;

    public function index(Request $request)
    {
        return view('blog.index', [
            'categories' => Category::withTranslation()->get(),
            'posts' => Post::withTranslation()
                ->with('media:id,url', 'categories.translations', 'user.media:id,url')
                ->when($request->has('category'), fn ($query) => $query->whereCategoryLike($request->input('category')))
                ->when($request->input('query'), fn ($q) => $q->whereMatchingTranslationTitleOrTags($request->input('query')))
                ->when($request->has('user'), function ($query) {
                    $query->whereHas('user', fn ($q) => $q->where('name', \request()->input('user'))
                    );
                })
                ->latest()
                ->paginate(8),
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::withTranslation()
            ->with(['media', 'user.media', 'categories.translations:name', 'tags.translations'])
            ->whereTranslation('slug', $slug)
            ->first();

        abort_if(! $post, 404);

        return view('blog.single', [
            'post' => $post,
            'latest' => Post::withTranslation()
                ->with('media')
                ->limit(4)
                ->latest()
                ->get(),
        ]);
    }
}
