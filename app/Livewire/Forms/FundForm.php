<?php

namespace App\Livewire\Forms;

use App\Models\Fund;
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

    public $fund;

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'amount' => 'required|numeric|min:0',
            'pourcentage' => 'required|numeric|min:0',
            'enclosed' => 'required|boolean',
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

    public function update(): void
    {
        $this->amount = 0;
        $this->validate();
        $this->fund->update($this->except('amount'));
    }

    public function store(): void
    {
        $this->amount = 0;
        $this->enclosed = false;
        $this->validate();
        Fund::create($this->except('amount'));
    }

    public function exchange(): void
    {
        $this->validate();
    }

}
