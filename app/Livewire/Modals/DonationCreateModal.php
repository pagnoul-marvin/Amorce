<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DonationForm;
use Livewire\Component;

class DonationCreateModal extends Component
{
    public bool $isOpen = false;
    public DonationForm $form;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }
}
