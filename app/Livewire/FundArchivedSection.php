<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundArchivedSection extends Component
{
    use WithPagination;

    public $fundArchivedIsOpen = false;

    protected $listeners = ['fundEnclosed' => 'fundEnclosed', 'fundOpened' => 'fundOpened'];

    #[Computed]
    public function fundEnclosed()
    {
        return Fund::where('enclosed', true)->orderBy('name')->paginate(5);
    }

    public function openArchivedFunds(): void
    {
        $this->fundArchivedIsOpen = !$this->fundArchivedIsOpen;
    }
}
