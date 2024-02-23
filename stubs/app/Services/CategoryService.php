<?php

namespace App\Services;

use App\Models\Adminify\Category;
use App\Traits\HasNullRequestValues;
use App\Traits\Multilingual;
use Illuminate\Http\Request;

class CategoryService
{
    use HasNullRequestValues, Multilingual;

    private array $data;

    private Request $request;

    private Category $category;

    public function setRequest($request): static
    {
        $this->request = $request;

        return $this;
    }

    public function setModel(Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function setValues(): static
    {
        $this->data = $this->request->only(
            array_merge($this->getAllDeclaredLanguages(), ['parent_id'])
        );

        return $this;
    }

    public function rejectNullValues(): static
    {
        $parentId = $this->data['parent_id'] ?? null;
        $this->data = $this->removeNullLanguageRequestIndex(
            $this->getLocalizedValues()
        );
        $this->data = array_merge($this->data, ['parent_id' => $parentId]);

        return $this;
    }

    public function syncTranslations(): static
    {
        $this->category
            ->translations()
            ->whereNotIn('locale', $this->getLocalizationKeys())
            ->delete();

        return $this;
    }

    public function create()
    {
        return Category::create($this->data);
    }

    public function update(): void
    {
        if (isset($this->data['parent_id']) && $this->data['parent_id'] === "null") {
            $this->data['parent_id'] = null;
        }
        
        $this->category->update($this->data);
    }

    public function getLocalizedValues(): array
    {
        return collect($this->data)
            ->only($this->getAllDeclaredLanguages())
            ->toArray();
    }

    private function getLocalizationKeys(): array
    {
        return collect($this->data)
            ->filter(function ($item, $key) {
                return in_array($key, $this->getAllDeclaredLanguages());
            })
            ->keys()
            ->toArray();
    }
}
