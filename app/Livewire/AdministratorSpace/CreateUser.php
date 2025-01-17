<?php

namespace App\Livewire\AdministratorSpace;

use App\Livewire\Forms\ProfileForm;
use Livewire\Component;

class CreateUser extends Component
{
    public ProfileForm $form;

    public $showPassword = false;

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }

    public function save(): void
    {
        $this->form->create();
        $this->form->reset();
        $this->dispatch('openSuccessMessage', 'L\'utilisateur a été créé avec succès !');
    }
}
