<?php

namespace App\View\Components;

use Closure;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationLink extends Component
{
    public string $link;

    public string $text;

    public function __construct(string $link, string $text)
    {
        $this->link = $link;
        $this->text = $text;

    }

    public function render(): View|Factory|Response|Htmlable|bool|string|Closure|Application
    {
        return view('components.navigation-link');
    }
}
