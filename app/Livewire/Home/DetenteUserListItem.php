<?php

namespace App\Livewire\Home;

use App\Models\User;
use Livewire\Component;

class DetenteUserListItem extends Component
{
    public $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }
}
