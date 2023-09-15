<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Requests\Admin\Adminify\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Adminify\Category\DeleteCategoryRequest;
use App\Models\Adminify\Category;
use App\Services\CategoryService;
use App\Traits\Multilingual;
use App\Http\Controllers\Controller;


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
            ->with('success', __('adminify.category_update'));
    }

    public function destroy(DeleteCategoryRequest $request, Category $category)
    {
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
