<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Donations extends Component
{
    use WithPagination;
    protected $listeners = ['donations' => 'donations'];
    public $orderDirection = 'desc';

    #[Computed]
    public function donations()
    {
        return Donation::orderBy('date', $this->orderDirection)->paginate(10);
    }

    public function switchOrderOfDate(): void
    {
        $this->orderDirection = $this->orderDirection === 'desc' ? 'asc' : 'desc';
    }
}


