<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Requests\Admin\Adminify\Post\CreatePostModelRequest;
use App\Http\Requests\Admin\Adminify\Post\DeletePostRequest;
use App\Http\Requests\Admin\Adminify\Post\UpdatePostModelRequest;
use App\Models\Adminify\Category;
use App\Models\Adminify\Post;
use App\Services\PostService;
use App\Traits\FileUploadOrSync;
use App\Traits\Multilingual;
use App\Traits\ReplaceSameFilesWithUniqueIds;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use Multilingual, ReplaceSameFilesWithUniqueIds, FileUploadOrSync;

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('admin.posts.create', [
            'categories' => Category::with(['translation', 'translations'])
                ->tree()
                ->get()
                ->toTree(),
        ]);
    }

    public function store(CreatePostModelRequest $request, PostService $service)
    {
        $service
            ->setRequest($request)
            ->setPublishedStatus()
            ->createPost()
            ->syncCategories()
            ->syncTags()
            ->syncMedia();

        return redirect()
            ->route('posts')
            ->with('success', __('adminify.post_create'));

    }

    public function edit(Post $post)
    {
        $post = $post->load(['translations.meta', 'tags', 'categories']);

        $post->translations->each(function ($item, $key) use ($post) {
            $post->translations->put($item->locale, $item);
            $post->translations->forget($key);
        });

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::with(['translation', 'translations'])
                ->tree()
                ->get()
                ->toTree(),
        ]);
    }

    public function update(UpdatePostModelRequest $request, Post $post, PostService $service): RedirectResponse
    {
        $service
            ->setModel($post)
            ->setRequest($request)
            ->setPublishedStatus()
            ->updatePost()
            ->syncCategories()
            ->updateMedia()
            ->syncTags();

        return redirect()
            ->route('posts')
            ->with('success', __('adminify.post_update'));

    }

    public function delete(DeletePostRequest $request, Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts')
            ->with('success', __('adminify.post_delete'));
    }

    public function search(Request $request)
    {
        return view('admin.posts.index', [
            'posts' => Post::whereTranslationLike('title', '%' . $request->search . '%', App::getLocale())
                ->orWhereTranslationLike('body', '%' . $request->search . '%', App::getLocale())
                ->paginate(15),
        ]);
    }
}
