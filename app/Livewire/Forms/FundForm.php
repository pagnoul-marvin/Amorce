<?php

namespace App\Livewire\Forms;

use App\Models\Fund;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FundForm extends Form
{
    #[Validate]
    public $enclosed;

    #[Validate]
    public $name;

    #[Validate]
    public $description;

    #[Validate]
    public $amount;

    #[Validate]
    public $pourcentage;

    #[Validate]
    public $from_fund;

    #[Validate]
    public $to_fund;

    public $fund;

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'amount' => 'required|numeric|min:0',
            'pourcentage' => 'required|numeric|min:0',
            'enclosed' => 'required|boolean',
            'from_fund' => 'required',
            'to_fund' => 'required',
        ];
    }

    public function setFund(Fund $fund): void
    {
        $this->fund = $fund;
        $this->enclosed = !$fund->enclosed;
        $this->name = $fund->name;
        $this->description = $fund->description;
        $this->pourcentage = $fund->pourcentage;
    }

    public function updateStatus(): void
    {
        $this->validateOnly('enclosed');
        $this->fund->update($this->only('enclosed'));
    }

    public function update(): void
    {
        $this->from_fund = 0;
        $this->to_fund = 0;
        $this->amount = 0;
        $this->enclosed = $this->fund->enclosed;
        $this->validate();
        $this->fund->update($this->except('amount', 'from_fund', 'to_fund'));
    }

    public function store(): void
    {
        $this->amount = 0;
        $this->from_fund = 0;
        $this->to_fund = 0;
        $this->enclosed = false;
        $this->validate();
        Fund::create($this->except('amount', 'from_fund', 'to_fund'));
    }

    public function exchange(): void
    {
        $this->enclosed = false;
        $this->name = false;
        $this->description = 'Échange d\'argent de '. Fund::find($this->from_fund)->name. ' vers '. Fund::find($this->to_fund)->name;
        $this->pourcentage = 0;
        $this->validate();

        Transaction::create([
            'amount' => -$this->amount * 100,
            'fund_id' => $this->from_fund,
            'note' => $this->description,
            'hash' => 'test', //TODO create a valid hash
            'date' => now()
        ]);

        Transaction::create([
            'amount' => $this->amount * 100,
            'fund_id' => $this->to_fund,
            'note' => $this->description,
            'hash' => 'aaaa', //TODO create a valid hash
            'date' => now()
        ]);
    }
}
