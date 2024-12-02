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
        $this->amount = $fund->amount;
    }

    public function update(): void
    {
        $this->validate();
        $this->fund->update($this->all());
    }

    public function store(): void
    {
        $this->enclosed = false;
        $this->amount = 0;
        $this->validate();
        Fund::create($this->all());
    }

    public function exchange(): void
    {
        $this->validate();

    }

}
