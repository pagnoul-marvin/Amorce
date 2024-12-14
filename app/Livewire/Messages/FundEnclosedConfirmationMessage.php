<?php

namespace App\Livewire\Messages;

use App\Livewire\Forms\FundForm;
use App\Models\Fund;
use Livewire\Component;

class FundEnclosedConfirmationMessage extends Component
{
    public $isOpen = false;
    public FundForm $form;
    public $fund;
    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal($id): void
    {
        $this->isOpen = true;
        $this->fund = Fund::find($id);
        $this->form->setFund($this->fund);
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save(): void
    {
        if (number_format($this->fund->transactions->sum('amount') / 100, 2, '.', ' ') == 0) {
            $this->form->updateStatus();
            $this->dispatch('closeModal');
            $this->dispatch('openSuccessMessage', 'Le fond ' . $this->fund->name . ' a été clotûré avec succès !');
            $this->dispatch('fundOpened');
            $this->dispatch('fundEnclosed');
        } else {
            $this->dispatch('closeModal');
            $this->dispatch('openNotAllowedMessageModal', 'Le fond ' . $this->fund->name . ' contient encore de l\'argent');
            $this->dispatch('fundOpened');
            $this->fund->amount = $this->fund->transactions()->sum('amount');
        }
    }
}
