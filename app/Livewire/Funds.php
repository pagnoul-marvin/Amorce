<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Component;

class Funds extends Component
{
    private $funds;
    public $enclosed_funds;
    public $in_process_funds;
    public function mount()
    {
        $this->funds = Fund::all();
        $this->in_process_funds = $this->funds->where('enclosed', '=', 0);
        $this->enclosed_funds = $this->funds->where('enclosed', '=', 1);
    }

    public function render()
    {
        return view('livewire.funds');
    }
}
