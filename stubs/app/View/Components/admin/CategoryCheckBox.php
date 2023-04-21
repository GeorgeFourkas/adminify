<?php

namespace App\View\Components\admin;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryCheckBox extends Component
{


    public Category $category;
    public $selected;
    public ?bool $tobeChecked;

    public function __construct(Category $category, bool|null $tobeChecked = null, $selected = [])
    {
        $this->category = $category;
        $this->selected = $selected;
        $this->tobeChecked = $tobeChecked;
    }


    public function render()
    {
        return view('components.admin.category-check-box');
    }

}
