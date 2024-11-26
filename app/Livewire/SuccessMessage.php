<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class SuccessMessage extends Component
{
    public $text;
    public $visible = false;
    protected $listeners = ['closeSuccessMessage' => 'closeSuccessMessage', 'openSuccessMessage' => 'openSuccessMessage'];

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.success-message');
    }

    public function openSuccessMessage(string $text): void
    {
        $this->text = $text;
        $this->visible = true;
    }

    public function closeSuccessMessage(): void
    {
        $this->visible = false;
    }
}
