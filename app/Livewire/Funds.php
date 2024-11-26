<?php

namespace App\Livewire;

use App\Models\Fund;
use Auth;
use Livewire\Component;

class Funds extends Component
{
    public $enclosed_funds;
    public $opened_funds;

    protected $listeners = ['fundEnclosed' => 'fundEnclosed', 'fundOpened' => 'fundOpened'];

    public function mount(): void
    {
        $this->enclosed_funds = Fund::where('enclosed', true)->orderBy('id')->get();
        $this->opened_funds = Fund::where('enclosed', false)->orderBy('id')->get();
    }

    public function fundEnclosed(): void
    {
        $this->enclosed_funds = Fund::all()->where('enclosed', '=', '1');
    }

    public function fundOpened(): void
    {
        $this->opened_funds = Fund::all()->where('enclosed', '=', '0');
    }
}
