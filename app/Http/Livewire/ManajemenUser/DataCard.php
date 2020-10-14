<?php

namespace App\Http\Livewire\ManajemenUser;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataCard extends Component
{
    use WithPagination;

    public $nama, $nip_nidn, $id_user;

    public $search = '';
    public $filter = 'semua';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::query()
            ->filter($this->filter)
            ->search($this->search)
            ->paginate(6);

        return view('livewire.manajemen-user.data-card', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function openModal($user)
    {
        $this->nama = $user['nama'];
        $this->nip_nidn = $user['nip_nidn'];
        $this->id_user = $user['id'];

        $this->dispatchBrowserEvent('openUserDeleteModal');
    }

    public function remove($id_user)
    {
        User::find($id_user)->delete();
        $this->dispatchBrowserEvent('closeUserDeleteModal');
        $this->dispatchBrowserEvent('swalDeleted');
    }
}
