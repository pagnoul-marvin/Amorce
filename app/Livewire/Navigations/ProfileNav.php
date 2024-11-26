<?php

namespace App\Livewire\Navigations;

use Auth;
use Livewire\Component;

class ProfileNav extends Component
{
    public $firstname;
    public $lastname;
    public $email;

    protected $listeners = ['profileUpdated' => 'profileUpdated'];

    public function mount()
    {
        $user = Auth::user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
    }

    public function profileUpdated($firstname, $lastname, $email)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }
}
