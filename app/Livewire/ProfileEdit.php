<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;
    public ProfileForm $form;

    public function mount()
    {
        $this->form->setUser();
    }

    public function save()
    {
        $this->form->update();
        $this->dispatch('openSuccessMessage', 'Votre profil a été mis à jour avec succès !');
        $this->dispatch('profileUpdated', $this->form->firstname, $this->form->lastname, $this->form->email);
    }
}
