<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $id;
    public $label;
    public $icon;
    public $type;
    public $name;
    public $value;
    public function __construct($id,$label,$icon,$type,$name,$value="")
    {
        $this->id = $id;
        $this->label = $label;
        $this->icon = $icon;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
