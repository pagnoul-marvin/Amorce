<?php

namespace App\Livewire;

use App\Livewire\Forms\FundForm;
use App\Models\Fund;
use Livewire\Component;

class FundOpened extends Component
{
    public FundForm $form;
    public $fund;
    protected $listeners = ['getFundAmount' => 'getFundAmount'];

    public function mount(Fund $fund): void
    {
        $this->fund = $fund;
        $this->form->setFund($fund);
        $this->fund->amount = $fund->transactions->sum('amount');
    }

    public function getFundAmount(): void
    {
        $this->fund->amount = $this->fund->transactions->sum('amount');
    }

    public function save(): void
    {
        if (number_format($this->fund->transactions->sum('amount') / 100, 2, '.', ' ') == 0) {
            $this->form->updateStatus();
            $this->dispatch('openSuccessMessage', 'Le fond ' . $this->fund->name . ' a été clotûré avec succès !');
            $this->dispatch('fundOpened');
            $this->dispatch('fundEnclosed');
        } else {
            $this->dispatch('openNotAllowedMessageModal', 'Le fond ' . $this->fund->name . ' contient encore de l\'argent');
            $this->dispatch('fundOpened');
            $this->fund->amount = $this->fund->transactions()->sum('amount');
        }
    }
}
