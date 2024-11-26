<?php

namespace App\Livewire\Forms;

use App\Models\Fund;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FundForm extends Form
{
    #[Validate]
    public $enclosed;

    public $fund;

    public function rules()
    {
        return [
          'enclosed' => ['required', 'boolean'],
        ];
    }

    public function setFund(Fund $fund)
    {
        $this->fund = $fund;
        $this->enclosed = !$fund->enclosed;
    }

    public function update()
    {
        $this->validate();
        $this->fund->update(['enclosed' => $this->enclosed]);
    }
}
