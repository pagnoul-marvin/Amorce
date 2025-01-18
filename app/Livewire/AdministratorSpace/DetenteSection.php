<?php

namespace App\Livewire\AdministratorSpace;

use App\Models\Detente;
use Livewire\Component;

class DetenteSection extends Component
{
    public $detente;
    public $detenteUsers;

    public function mount(): void
    {
        $this->loadCurrentDetente();
    }

    private function loadCurrentDetente(): void
    {
        $this->detente = Detente::where('starting_at', '<=', now())
            ->where('ending_at', '>=', now())
            ->first();

        if (!$this->detente) {
            $this->detente = Detente::orderBy('ending_at', 'desc')->first();
        }

        $this->detenteUsers = $this->detente ? $this->detente->users : [];
    }

    public function previousDetente(): void
    {
        if ($this->detente) {
            $previousDetente = Detente::where('id', $this->detente->id - 1)
                ->first();

            if ($previousDetente) {
                $this->detente = $previousDetente;
                $this->detenteUsers = $this->detente->users;
            } else {
                $this->dispatch('openErrorMessage', 'Il n\'y a pas de détente avant celle-ci.');
            }
        }
    }

    public function nextDetente(): void
    {
        if ($this->detente) {
            $nextDetente = Detente::where('id', $this->detente->id + 1)
                ->first();

            if ($nextDetente) {
                $this->detente = $nextDetente;
                $this->detenteUsers = $this->detente->users;
            } else {
                $this->dispatch('openErrorMessage', 'Il n\'y a pas de détente après celle-ci.');
            }
        }
    }
}
