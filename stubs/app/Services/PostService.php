<?php

namespace App\Services;

use App\Models\Adminify\Post;
use App\Traits\FileUploadOrSync;
use App\Traits\Multilingual;
use App\Traits\ReplaceSameFilesWithUniqueIds;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class PostService
{
    use FileUploadOrSync, Multilingual, ReplaceSameFilesWithUniqueIds;

    private Request $request;

    private Post $post;

    private bool $published;

    private array|Collection $data;

    public function setRequest(Request $request): static
    {
        $this->request = $request;
        $this->data = collect($this->request->all());

        return $this;
    }

    public function setPublishedStatus(): static
    {
        $this->published = $this->request->has('published');

        return $this;
    }

    public function setModel(Post $post): static
    {
        $this->post = $post;

        return $this;
    }

    public function createPost(): static
    {

        $this->post = $this->request->user()->posts()->create(
            collect($this->data)
                ->put('published', $this->published)
                ->toArray()
        );

        return $this;
    }

    public function updatePost(): static
    {
        $this->post->update(
            collect($this->data)
                ->put('published', $this->published)
                ->toArray()
        );

        return $this;
    }

    public function syncTags(): static
    {
        $this->post->tags()->sync($this->request->tags);

        return $this;
    }

    public function syncCategories(): static
    {
        $this->post->categories()->sync($this->request->categories);

        return $this;
    }

    public function syncMedia(): static
    {
        $this->post->uploadOrAttach($this->request->featured_image_url);

        return $this;
    }

    public function updateMedia(): static
    {
        if ($this->request->featured_image_url && is_string($this->request->featured_image_url)) {

            $this->post->media()->sync($this->request->featured_image_url);

        } elseif ($this->request->featured_image_url && $this->request->featured_image_url instanceof UploadedFile) {

            $this->post->media()->sync($this->post->createMediaModel($this->request->featured_image_url, 'public/posts')->id);

        }

        return $this;
    }
}
