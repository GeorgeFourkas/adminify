<?php

namespace App\Http\Controllers\Adminify;

use App\Http\Requests\Post\CreatePostModelRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\UpdatePostModelRequest;
use App\Models\Adminify\Category;
use App\Models\Adminify\Post;
use App\Services\PostService;
use App\Traits\FileUploadOrSync;
use App\Traits\Multilingual;
use App\Traits\ReplaceSameFilesWithUniqueIds;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use Multilingual, ReplaceSameFilesWithUniqueIds, FileUploadOrSync;

    public function show(string $slug)
    {
        $settings = $this->getStore();

        return view('posts.single', [
            'post' => Post::with('user', 'translation.media')
                ->when($settings->get('comments_enabled'), function ($query) {
                    $query->with(['comments' => function ($q) {
                        $q->with('user')->where('approved', true);
                    }])->withCount(['comments' => function ($q) {
                        $q->where('approved', true);
                    }]);
                })
                ->whereTranslation('slug', $slug)
                ->firstOrFail(),
            'comments_enabled' => $settings->get('comments_enabled'),
            'unregistered_users_can_comment' => $settings->get('unregistered_users_can_comment'),
        ]);
    }

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
            ->rejectNullValues()
            ->createPost()
            ->syncCategories()
            ->syncTags()
            ->syncMeta()
            ->syncMedia();

        return redirect()
            ->route('posts')
            ->with('success', __('Post created Successfully'));

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
            ->rejectNullValues()
            ->syncTranslations()
            ->updatePost()
            ->syncCategories()
            ->updateMedia()
            ->syncMeta()
            ->syncTags();

        return redirect()
            ->route('posts')
            ->with('success', __('Post Updated Successfully'));

    }

    public function delete(DeletePostRequest $request, Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts')
            ->with('success', __('Post Deleted Successfully '));
    }

    public function search(Request $request)
    {
        return view('admin.posts.index', [
            'posts' => Post::whereTranslationLike('title', '%'.$request->search.'%', \App::getLocale())
                ->orWhereTranslationLike('body', '%'.$request->search.'%', \App::getLocale())
                ->paginate(15),
        ]);
    }
}
