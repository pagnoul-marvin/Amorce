<?php

namespace App\Livewire\FundsAndTransactions;

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
}
