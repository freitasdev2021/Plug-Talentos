<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formpost extends Component
{
    public $to;
    public $back;
    public $file;
    /**
     * Create a new component instance.
     */
    public function __construct($to,$back,$file)
    {
        $this->to = $to;
        $this->back = $back;
        $this->file = $file;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-post');
    }
}
