<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundTransactions extends Component
{
    use WithPagination;

    public $fund;
    public $orderDirection = 'desc';

    protected $listeners = ['transactions' => 'transactions', 'fund' => 'mount'];

    public function mount($fund): void
    {
        $this->fund = $fund;
    }

    #[Computed]
    public function transactions()
    {
        return $this->fund->transactions()->orderBy('date', $this->orderDirection)->paginate(10);
    }

    public function switchOrderOfDate(): void
    {
        $this->orderDirection = $this->orderDirection === 'desc' ? 'asc' : 'desc';
    }
}
