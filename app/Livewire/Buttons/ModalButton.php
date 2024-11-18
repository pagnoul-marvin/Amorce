<?php

namespace App\Livewire\Buttons;

use Livewire\Component;

class ModalButton extends Component
{
    public $button_or_link;
    public $title;
    public $type;
    public $href;
    public $to;
    public $event;

    public function render()
    {
        return view('livewire.buttons.modal-button');
    }
}
