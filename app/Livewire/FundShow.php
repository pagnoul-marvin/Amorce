<?php

namespace App\Livewire;

use App\Livewire\Forms\FundForm;
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
