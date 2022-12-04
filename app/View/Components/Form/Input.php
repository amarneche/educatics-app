<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type="text";
    public $value="";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label,$type="text",$value="")
    {
        //
        $this->name=$name;
        $this->label=$label;
        $this->type=$type;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
