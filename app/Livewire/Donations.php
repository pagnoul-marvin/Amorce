<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;

class Donations extends Component
{
    use WithPagination;

    public function render()
    {
        $donations = Donation::orderby('date', 'desc')->paginate(10);
        return view('livewire.donations', [
            'donations' => $donations
        ]);
    }
}


