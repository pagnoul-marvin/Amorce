<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundOpenedSection extends Component
{
    use WithPagination;

    protected $listeners = ['fundOpened' => 'fundOpened'];

    #[Computed]
    public function fundOpened()
    {
        return Fund::where('enclosed', false)->orderBy('id')->paginate(5);
    }

    public function render()
    {
        return view('livewire.fund-opened-section');
    }
}
