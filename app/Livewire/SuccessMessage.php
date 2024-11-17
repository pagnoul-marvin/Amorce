<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class SuccessMessage extends Component
{
    public $text;
    public $visible;

    public function mount(): void
    {
        $this->visible = session('status') === 'success';
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.success-message');
    }

    public function closeSuccessMessage(): void
    {
        $this->visible = false;
    }
}
