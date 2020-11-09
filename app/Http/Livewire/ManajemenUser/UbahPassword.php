<?php

namespace App\Http\Livewire\ManajemenUser;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UbahPassword extends Component
{
    public $current_password, $new_password, $confirm_password;

    protected $rules = [
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ];

    public function render()
    {
        return view('livewire.manajemen-user.ubah-password');
    }

    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'new_password' => 'required|min:6',
    //         'confirm_password' => 'required|same:new_password',
    //     ]);
    // }

    public function submit()
    {
        $user = auth()->user();
        $user_password = $user->password;

        if (Hash::check($this->current_password, $user_password)) {
            // dd('testing');
            if ($this->validate()) {
                $password = Hash::make($this->new_password);

                $user->update(['password' => $password]);
                session()->flash('success', 'Password telah berhasil diubah.');
            }
        } else {
            session()->flash('error', 'Password yang anda masukkan salah.');
        }
    }
}
