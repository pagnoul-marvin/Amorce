<?php

namespace App\Livewire\Home;

use App\Models\Detente;
use Livewire\Component;

class Home extends Component
{
    public $detenteUsers;
    public $actualDetente;
    public function mount(): void
    {
        $this->actualDetente = Detente::where('starting_at', '<=', now())
            ->where('ending_at', '>=', now())->first();
        $this->detenteUsers = $this->actualDetente->users;
    }
}
