<?php

namespace App\Livewire\FundsAndTransactions;

use App\Models\Fund;
use Livewire\Component;

class FundShow extends Component
{
    public $fund;

    public function mount(Fund $fund): void
    {
        $this->fund = $fund;
    }
}
