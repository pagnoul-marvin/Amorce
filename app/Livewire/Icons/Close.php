<?php

namespace App\Livewire\Icons;

use Livewire\Component;

class Close extends Component
{
    public $to;
    public $event;
    public function render()
    {
        return view('livewire.icons.close');
    }
}
