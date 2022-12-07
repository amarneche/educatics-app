<?php

namespace App\View\Components\Form;

use App\Models\Role;
use Illuminate\View\Component;

class Select extends Component
{

    public $label="";
    public $name=null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null)
    {
        //
        $this->name=$name;
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }

    public function getUserRoles(){
        return Role::all()->pluck('name');
    }
}
