<?php

namespace App\Livewire;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public bool $isLightTheme;

    public function mount(): void
    {
        $this->isLightTheme = session('theme', 'light') === 'light';
    }

    public function setTheme($theme): void
    {
        $this->isLightTheme = $theme === 'light';

        session(['theme' => $theme]);

        $this->dispatch('theme-updated', ['theme' => $theme]);
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
