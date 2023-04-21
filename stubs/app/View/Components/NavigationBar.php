<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navigationBar extends Component
{
    public bool $transparent;

    public function __construct($transparent = true)
    {
        $this->transparent = $transparent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.navigation-bar');
    }
}
