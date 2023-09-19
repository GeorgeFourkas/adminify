<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextField extends Component
{
    public string $label;

    public string $name;

    public ?string $value;

    public string $id;

    /**
     * @param  string  $value
     */
    public function __construct(string $label, string $name, string $id, string $value = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.admin.text-field');
    }
}
