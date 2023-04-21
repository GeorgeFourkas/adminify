<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class StatisticCard extends Component
{

    public string $title;
    public string $type;

    public function __construct(string $title, string $type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.admin.statistic-card');
    }
}
