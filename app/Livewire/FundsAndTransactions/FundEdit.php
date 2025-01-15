<?php

namespace App\Livewire\FundsAndTransactions;

use App\Livewire\Forms\FundForm;
use App\Models\Fund;
use Livewire\Component;

class FundEdit extends Component
{
    public $fund;
    public FundForm $form;
    protected $listeners = ['mount' => 'mount'];

    public function mount(Fund $fund): void
    {
        $this->form->setFund($fund);
    }

    public function save(): void
    {
        $this->form->update();
        $this->dispatch('mount', $this->fund);
        $this->dispatch('openSuccessMessage', 'Le fond '.$this->fund->name. ' a bien été mis à jour !');
    }
}
