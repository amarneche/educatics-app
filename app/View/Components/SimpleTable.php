<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleTable extends Component
{

    public $headers;
    public $collection;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers,$collection)
    {
        //
        $this->headers=$headers;
        $this->collection=$collection;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.simple-table');
    }
}
