<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use Hash;
use Livewire\Component;

class ModifyProfilePasswordModal extends Component
{
    public $isOpen = false;

    public $user;

    public ProfileForm $form;

    public $showOldPassword = false;

    public $showNewPassword = false;

    protected $listeners = ['openModifyProfilePasswordModal' => 'openModifyProfilePasswordModal', 'closeModifyProfilePasswordModal' => 'closeModifyProfilePasswordModal'];

    public function openModifyProfilePasswordModal(User $user): void
    {
        $this->isOpen = true;
        $this->form->setUser();
        $this->user = $user;
    }

    public function closeModifyProfilePasswordModal(): void
    {
        $this->isOpen = false;
    }

    public function toggleOldPasswordVisibility(): void
    {
        $this->showOldPassword = !$this->showOldPassword;
    }

    public function toggleNewPasswordVisibility(): void
    {
        $this->showNewPassword = !$this->showNewPassword;
    }

    public function save(): void
    {
        if (Hash::check($this->form->old_password, $this->user->password)) {
            $this->form->updatePassword();
            $this->form->reset();
            $this->dispatch('closeModifyProfilePasswordModal');
            $this->dispatch('openSuccessMessage', 'Votre mot de passe à été mis à jour avec succès !');
        } else {
            $this->dispatch('openErrorMessage', 'Erreur ! Votre mot de passe actuel ne correspond pas à celui qui est enregistré');
        }
    }
}
