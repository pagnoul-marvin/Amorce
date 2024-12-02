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

    #[Computed]
    public function donations()
    {
        return Donation::orderBy('date', 'desc')->paginate(10);
    }

    public function render()
    {
        return view('livewire.donations');
    }
}


