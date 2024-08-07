<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adminify\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Adminify\Category\DeleteCategoryRequest;
use App\Http\Requests\Admin\Adminify\Category\UpdateCategoryRequest;
use App\Models\Adminify\Category;
use App\Services\CategoryService;
use App\Traits\Multilingual;

class CategoryController extends Controller
{
    use Multilingual;

    public function store(CreateCategoryRequest $request, CategoryService $service)
    {
        $category = $service
            ->setRequest($request)
            ->setValues()
            ->rejectNullValues()
            ->create();

        return $request->expectsJson()
            ? response()->json($category)
            : redirect()->route('categories')->with('success', __('adminify.category_create'));
    }

    public function update(UpdateCategoryRequest $request, Category $category, CategoryService $service)
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
            ->with('success', __('adminify.category_update'));
    }

    public function destroy(DeleteCategoryRequest $request, Category $category)
    {
        is_null($category->parent_id)
            ? $category->children()->update(['parent_id' => null])
            : $category->children()->update(['parent_id' => $category->parent_id]);

        $category->delete();

        return $this->redirection(__('adminify.category_delete'));
    }

    private function redirection(string $message)
    {
        return redirect()
            ->route('categories')
            ->with('success', $message);
    }
}
