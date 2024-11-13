<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ShowPassword extends Component
{
    public $id;
    public $label;
    public $placeholder;
    public $required;
    public $class;
    public $showPassword = false;

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.show-password');
    }
}
