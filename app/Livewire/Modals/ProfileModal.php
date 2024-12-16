<?php

namespace App\Livewire\Modals;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ProfileModal extends Component
{
    public bool $isOpen = false;
    public string $title;
    public array $links;
    protected $listeners = ['toggleProfileModalVisibility' => 'toggleProfileModalVisibility'];

    public function mount(): void
    {
        $this->title = __('texts.profile_navigation');
        $this->links = [
          ['name' => 'Profil', 'url' => '/profil'],
        ];
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.modals.profile-modal');
    }

    public function toggleProfileModalVisibility(): void
    {
        $this->isOpen = !$this->isOpen;
    }
}
