<?php

namespace App\Livewire\Forms;

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
            'note' => 'required',
            'amount' => 'required|numeric|min:0',
            'fund_id' => 'required',
            'date' => 'required|date',
        ];
    }
}
