<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;
    public ProfileForm $form;

    public function mount(): void
    {
        $this->form->setUser();
    }

    public function save(): void
    {
        $this->form->update();
        $this->dispatch('openSuccessMessage', 'Votre profil a été mis à jour avec succès !');
        $this->dispatch('profileUpdated', $this->form->firstname, $this->form->lastname, $this->form->email);
    }
}
