<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\FileUploadOrSync;
use App\Traits\HasNullRequestValues;
use App\Traits\Multilingual;
use App\Traits\ReplaceSameFilesWithUniqueIds;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PostService
{

    use Multilingual, ReplaceSameFilesWithUniqueIds, FileUploadOrSync, HasNullRequestValues;

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

    public function rejectNullValues(): static
    {
        $this->data = $this->removeNullLanguageRequestIndex($this->data->toArray());

        return $this;
    }

    public function syncTranslations(): static
    {
        $this->post
            ->translations()
            ->whereNotIn('locale', (array_keys($this->data)))
            ->delete();

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
        $this->uploadPostMediaWithoutDuplicates($this->post, $this->request);

        return $this;
    }

    public function syncMeta(): static
    {
        foreach ($this->post->translations as $translation) {
            if (isset($this->request->{$translation->locale}['meta'])) {
                $localeMeta = ($this->request->{$translation->locale}['meta']);
                $names = $localeMeta['name'];
                $values = $localeMeta['value'];

                foreach ($names as $key => $name) {
                    $translation->setMeta($name, $values[$key]);
                }
            }
        }

        return $this;
    }

    public function updateMedia(): static
    {
        collect($this->request->all())
            ->filter(fn($value, $key) => in_array($key, $this->getAllDeclaredLanguages()))
            ->filter(fn($value) => isset($value['featured_image_url']))
            ->each(function ($item, $languageKey) {
                $this->createOrSync(
                    $this->post->translations->where('locale', $languageKey)->first(),
                    $item['featured_image_url'],
                );
            });

        return $this;
    }
}
