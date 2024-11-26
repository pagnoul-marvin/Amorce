<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    #[Validate]
    public $lastname;

    #[Validate]
    public $firstname;

    #[Validate]
    public $email;

    #[Validate]
    public $password;

    #[Validate]
    public $picture = null;

    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255', 'min:3'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore(Auth::id()),],
            'password' => ['required'],
            'picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function setUser(): void
    {
        $user = Auth::user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function update(): void
    {
        $this->validate();

        $data = array_filter($this->all(), function ($value) {
            return !is_null($value);
        });

        Auth::user()->update($data);

    }
}
