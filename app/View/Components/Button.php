<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($type , $id)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('user.components.button');
    }
}
