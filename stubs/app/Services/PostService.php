<?php

namespace App\Services;

use App\Models\Adminify\Post;
use App\Traits\FileUploadOrSync;
use App\Traits\Multilingual;
use App\Traits\ReplaceSameFilesWithUniqueIds;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PostService
{
    use Multilingual;

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

    public function syncMedia($files): static
    {
        $this->post->saveMedia($files);

        return $this;
    }
}
