<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;
    protected $listeners = ['transactions' => 'transactions'];
    public $orderDirection = 'desc';
    public $icon_visible = true;

    #[Computed]
    public function transactions()
    {
        return Transaction::orderBy('date', $this->orderDirection)->paginate(10);
    }

    public function switchOrderOfDate(): void
    {
        $this->orderDirection = $this->orderDirection === 'desc' ? 'asc' : 'desc';
        $this->icon_visible = !$this->icon_visible;
    }
}


