<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHeading extends Component
{
    public string $text;

    public bool $pl;

    public function __construct($text, $pl = false)
    {
        $this->text = $text;
        $this->pl = $pl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.admin.table-heading');
    }
}
