<?php

namespace App\Livewire\Messages;

use Livewire\Component;

class ErrorMessage extends Component
{
    public $text;
    public $visible = false;

    protected $listeners = ['closeErrorMessage' => 'closeErrorMessage', 'openErrorMessage' => 'openErrorMessage'];

    public function openErrorMessage(string $text): void
    {
        $this->text = $text;
        $this->visible = true;
        $this->dispatch('start-error-message-timer');
    }
}
