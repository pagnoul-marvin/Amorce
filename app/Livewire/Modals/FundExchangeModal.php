<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\FundForm;
use App\Models\Fund;
use Livewire\Component;

class FundExchangeModal extends Component
{
    public $isOpen = false;
    public $funds;
    public FundForm $form;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
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

    public function save(): void
    {
        $this->form->store();
    }
}
