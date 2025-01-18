<?php

namespace App\Livewire\Forms;

use App\Enum\UserRoles;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;
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
    public $phone;

    #[Validate]
    public $picture = null;
    #[Validate]
    public $old_password;
    #[Validate]
    public $new_password;

    #[Validate]
    public $role;

    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255', 'min:3'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'lowercase', 'email', 'max:255',],
            'phone' => ['required', 'numeric', 'digits:10',],
            'password' => ['required', 'min:10', 'regex:/^(?=.*[0-9])(?=.*[\W_]).+$/'],
            'old_password' => ['required', 'min:10', 'regex:/^(?=.*[0-9])(?=.*[\W_]).+$/'],
            'new_password' => ['required', 'min:10', 'regex:/^(?=.*[0-9])(?=.*[\W_]).+$/'],
            'picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'role' => ['required','in:'.implode(',', UserRoles::values())],
        ];
    }

    public function setUser(): void
    {
        $user = Auth::user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->role;
        $this->password = $user->password;
    }

    public function update(): void
    {
        $this->validateOnly('firstname');
        $this->validateOnly('lastname');
        $this->validateOnly('email', [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],
        ]);
        $this->validateOnly('phone', [
            'phone' => [
                'required',
                'digits:10',
                'numeric',
                Rule::unique('users', 'phone')->ignore(Auth::id()),
            ],
        ]);
        $this->validateOnly('picture');

        if ($this->picture) {
            $picture_path = Storage::putFile('users/' . Auth::id() . '/original', $this->picture);

            $sizes = Config::get('photos.sizes');
            foreach ($sizes as $size => $value) {

                if (is_null($value)) {
                    continue;
                }

                $photo = Image::read(Storage::get($picture_path));

                if (is_array($value)) {
                    $photo->cover($value['width'], $value['height']);
                } else {
                    $photo->scale($value);
                }
                $file = str_replace('original', $size, $picture_path);
                $directory = dirname($file);

                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                Storage::put($file, $photo->encode());
            }
        }
        $data = $this->all();
        if ($this->picture) {
            $data['picture'] = $picture_path;
        }
        Auth::user()->update($data);
    }

    public function updatePassword(): void
    {
        $this->validateOnly('new_password');
        $this->validateOnly('old_password');

        Auth::user()->update(['password' => Hash::make($this->new_password)]);
    }

    public function create(): void
    {
        $this->validateOnly('firstname');
        $this->validateOnly('lastname');
        $this->validateOnly('email', [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
        ]);
        $this->validateOnly('phone', [
            'phone' => [
                'required',
                'digits:10',
                'numeric',
                Rule::unique('users', 'phone'),
            ],
        ]);
        $this->validateOnly('password');
        $this->validateOnly('role');

        User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->new_password),
            'role' => $this->role,
        ]);
    }
}
