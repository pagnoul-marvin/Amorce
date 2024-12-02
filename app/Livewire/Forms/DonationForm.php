<?php

namespace App\Livewire\Forms;

use App\Models\Donation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DonationForm extends Form
{
    #[Validate]
    public $note;

    #[Validate]
    public $amount;
    #[Validate]
    public $fund_id;

    #[Validate]
    public $date;

    public $donation;

    public function rules(): array
    {
        return [
            'note' => 'max:255',
            'amount' => 'required|numeric|min:0',
            'fund_id' => 'required',
            'date' => 'required|date',
        ];
    }

    public function store()
    {
        $this->validate();
        Donation::create($this->all());
    }
}
