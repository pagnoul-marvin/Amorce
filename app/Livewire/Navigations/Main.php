<?php

namespace App\Livewire\Navigations;

use Livewire\Component;

class Main extends Component
{
    public bool $isNavVisible = true;
    public function toggleNav(): void
    {
        $this->isNavVisible = !$this->isNavVisible;
        $this->dispatch('toggle-nav', ['isNavVisible' => $this->isNavVisible]);
    }
}
