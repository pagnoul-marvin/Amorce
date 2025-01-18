<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileShow extends Component
{
    public $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }
}
