<?php

namespace App\Livewire;

use App\Livewire\Forms\TransactionForm;
use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundTransactions extends Component
{
    use WithPagination;

    public $fund;
    public TransactionForm $form;
    public $orderDirection = 'desc';

    protected $listeners = ['transactions' => 'transactions'];

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

    public function save($transaction_id): void
    {
        $transaction = Transaction::find($transaction_id);
        $this->form->delete($transaction);
        $this->dispatch('openSuccessMessage', 'La transaction a bien été supprimée !');
        $this->dispatch('transactions');
    }
}
