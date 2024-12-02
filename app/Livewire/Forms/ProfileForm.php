<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Auth;
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
        $data['picture'] = $picture_path;
        Auth::user()->update($data);
    }
}
