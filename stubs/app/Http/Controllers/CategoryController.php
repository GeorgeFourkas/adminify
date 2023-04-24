<?php

namespace App\Http\Controllers\Adminify;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Models\Adminify\Category;
use App\Services\CategoryService;
use App\Traits\Multilingual;

class CategoryController extends Controller
{
    use Multilingual;

    public function store(CreateCategoryRequest $request, CategoryService $service)
    {
        $service
            ->setRequest($request)
            ->setValues()
            ->rejectNullValues()
            ->create();

        return redirect()
            ->route('categories')
            ->with('success', __('Category created successfully'));
    }

    public function update(CreateCategoryRequest $request, Category $category, CategoryService $service)
    {
        $service
            ->setRequest($request)
            ->setModel($category)
            ->setValues()
            ->rejectNullValues()
            ->syncTranslations()
            ->update();

        return redirect()
            ->route('categories')
            ->with('success', __('Category updated successfully'));
    }

    public function destroy(DeleteCategoryRequest $request, Category $category)
    {
        $category->delete();

        return $this->redirection(__('Category Deleted Successfully'));
    }

    private function redirection(string $message)
    {
        return redirect()
            ->route('categories')
            ->with('success', $message);
    }
}
