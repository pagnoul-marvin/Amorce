<?php

namespace App\Livewire\Forms;

use App\Models\Detente;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DetenteForm extends Form
{
    #[Validate]
    public $starting_at;

    #[Validate]
    public $ending_at;

    public $detente;

    public function rules(): array
    {
        return [
            'starting_at' => 'required|date|before:ending_at',
            'ending_at' => 'required|date|after:starting_at',
        ];
    }

    public function store(): void
    {
        $this->validate();
        Detente::create($this->all());
    }

    public function update(Detente $detente): void
    {
        $this->validate();
        $detente->update($this->all());
    }

    public function setDetente(Detente $detente): void
    {
        $this->detente = $detente;
        $this->starting_at = $detente->starting_at;
        $this->ending_at = $detente->ending_at;
    }
}
