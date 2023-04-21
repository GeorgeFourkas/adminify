<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddPostForm extends Component
{
    public string $locale;

    public function __construct($languageCode)
    {
        $this->locale = $languageCode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.admin.add-post-form');
    }
}
