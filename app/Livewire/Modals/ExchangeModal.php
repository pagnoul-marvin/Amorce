<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;

class ExchangeModal extends Component
{
    public $isOpen = false;
    public $users;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.modals.exchange-modal');
    }
}
