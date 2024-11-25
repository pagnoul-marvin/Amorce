<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class AddDonationModal extends Component
{
    public bool $isOpen = false;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modals.add-donation-modal');
    }
}
