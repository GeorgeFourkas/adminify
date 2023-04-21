<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class LanguageTabsHeader extends Component
{

    public array $locales;

    public function __construct(array $locales)
    {
        $this->locales = $locales;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.language-tabs-header');
    }
}
