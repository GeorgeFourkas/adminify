<?php

namespace App\View\Components\admin;

use App\Models\Adminify\Category;
use Illuminate\View\Component;

class CategoryChild extends Component
{
    public Category $category;

    public string $parentId;

    public string $parentName;

    public function __construct(Category $category, string $parentId, string $parentName)
    {
        $this->parentId = $parentId;
        $this->parentName = $parentName;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.category-child');
    }
}
