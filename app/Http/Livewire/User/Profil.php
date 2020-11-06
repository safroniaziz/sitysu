<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profil extends Component
{
    use WithFileUploads;

    public $nama, $nip, $alamat, $no_hp, $jk, $foto_profil;

    protected $rules = [
        'nama' => 'required',
        'nip' => 'required',
        'jk' => 'nullable',
        'alamat' => 'nullable',
        'no_hp' => 'nullable',
        'foto_profil' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $user = auth()->user();
        $this->nama = $user->nama;
        $this->nip = $user->nip;
        $this->alamat = $user->alamat;
        $this->no_hp = $user->no_hp;
        $this->jk = $user->jk;
        $this->foto_profil = $user->foto_profil;
    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.user.profil', compact('user'));
    }

    public function submit()
    {
        $user = auth()->user();

        $data = $this->validate();

        if ($this->foto_profil) {
            $data['foto_profil'] = $this->foto_profil->store('foto-profil');
        }

        $this->dispatchBrowserEvent('swalUpdated');
        $user->update($data);
    }
}
