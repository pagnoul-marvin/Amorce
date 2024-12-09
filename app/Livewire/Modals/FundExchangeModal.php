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
        $this->funds = Fund::where('enclosed', false)->get();
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
        $this->form->exchange();
        $this->form->reset();
        $this->dispatch('closeModal');
        $this->dispatch('getFundAmount');
        $this->dispatch('transactions');
        $this->dispatch('openSuccessMessage', 'L\'échange a bien été éffectué !');
    }
}
