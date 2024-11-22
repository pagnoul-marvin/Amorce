<?php

namespace App\Livewire\Buttons;

use Livewire\Component;

class ModalButton extends Component
{
    public $title;
    public $type;
    public $to;
    public $event;

    public function render()
    {
        return view('livewire.buttons.modal-button');
    }
}
