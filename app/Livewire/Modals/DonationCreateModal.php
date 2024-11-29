<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DonationForm;
use App\Models\Fund;
use Livewire\Component;

class DonationCreateModal extends Component
{
    public bool $isOpen = false;
    public DonationForm $form;
    public $funds;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount()
    {
        $this->funds = Fund::all();
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
