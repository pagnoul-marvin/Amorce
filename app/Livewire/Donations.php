<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Donations extends Component
{
    use WithPagination;

    public function render()
    {
        $donations = Donation::orderby('created_at')->paginate(6);
        return view('livewire.donations', compact('donations'));
    }
}
