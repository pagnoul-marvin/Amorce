<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class ExchangeModal extends Component
{
    public $isOpen = false;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function render()
    {
        return view('livewire.modals.exchange-modal');
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }
}
