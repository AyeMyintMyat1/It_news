<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $link,$class,$menu,$counter,$css;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link="#",$class,$counter="",$menu,$css="")
    {
        $this->link=$link;
        $this->class=$class;
        $this->counter=$counter;
        $this->menu=$menu;
        $this->css=$css;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
