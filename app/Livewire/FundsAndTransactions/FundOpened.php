<?php

namespace App\Livewire\FundsAndTransactions;

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
}
