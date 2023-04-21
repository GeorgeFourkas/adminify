<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabHeader extends Component
{
    public string $id;

    public string $tabName;

    public function __construct(string $id, string $tabName)
    {
        $this->id = $id;
        $this->tabName = $tabName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.admin.tab-header');
    }
}
