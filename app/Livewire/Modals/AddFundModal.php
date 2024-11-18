<?php

namespace App\Livewire\Modals;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AddFundModal extends Component
{
    public $isOpen = false;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.modals.add-fund-modal');
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
