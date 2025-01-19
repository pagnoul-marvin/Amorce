<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\ProfileForm;
use App\Livewire\Forms\TransactionForm;
use App\Models\Fund;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LinkATransactionToAFundModal extends Component
{
    public $funds;
    public TransactionForm $form;
    public ProfileForm $userForm;
    public $transactionCounter = 0;
    public $isOpen = false;
    public $showPassword = false;
    public $IBAN;

    protected $listeners = ['openModal' => 'openModal', 'openLinkATransactionToAFund' => 'openModal', 'closeModal' => 'closeModal', 'mount' => 'mount'];

    public function mount(): void
    {
        $this->funds = Fund::where('enclosed', '=', false)->get();
        if ($this->transactions) {
            $this->form->note = $this->transactions[$this->transactionCounter][8];
            $this->form->amount = floatval(str_replace([',', '.'], '', $this->transactions[$this->transactionCounter][2]));
            $this->form->date = Carbon::parse($this->transactions[$this->transactionCounter][0]);
            $this->form->hash = $this->transactions[$this->transactionCounter][10];
            $this->form->user_id = User::where('IBAN', $this->IBAN)->first()->id ?? '';
            $this->IBAN = $this->transactions[$this->transactionCounter][3];
        }
    }

    #[Computed]
    public function transactions()
    {
        return session('transactionsNeedToBeLinked', []);
    }

    public function openModal(): void
    {
        $this->isOpen = true;
        $this->dispatch('mount');
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save(): void
    {
        $this->form->storeTransactionFromCSV($this->form->user_id);
        $transactions = $this->transactions;
        unset($transactions[$this->transactionCounter]);
        $transactions = array_values($transactions); //réindexe le tableau
        session(['transactionsNeedToBeLinked' => $transactions]);
        $this->dispatch('openSuccessMessage', 'La transaction a été ajouté au fond ' .Fund::find($this->form->fund_id)->name. ' avec succès !');
        $this->dispatch('mount');
        $this->form->reset();
        $this->dispatch('getFundAmount');
    }

    public function createUser(): void
    {
        $this->userForm->createFromCSV($this->IBAN);
        $this->userForm->reset();
        $this->dispatch('openSuccessMessage', 'L\'utilisateur a été créé avec succès !');
        $this->dispatch('mount');
    }

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }
}
