<?php

namespace App\Livewire;

use App\Livewire\Forms\FundForm;
use App\Models\Fund;
use Livewire\Component;

class FundEnclosed extends Component
{
    public FundForm $form;
    public $fund;

    public function mount(Fund $fund): void
    {
        $this->fund = $fund;
        $this->form->setFund($fund);
    }

    public function save(): void
    {
        $this->form->update();
        $this->dispatch('openSuccessMessage', 'Le fond '. $this->fund->name .' a été ouvert avec succès !');
        $this->dispatch('fundOpened');
        $this->dispatch('fundEnclosed');
    }
}
