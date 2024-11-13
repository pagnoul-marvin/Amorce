<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class ProfileModal extends Component
{
    public $isOpen = false;

    public function render()
    {
        return view('livewire.modals.profile-modal');
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
