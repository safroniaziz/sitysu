<?php

namespace App\Http\Livewire\ManajemenUser;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataCard extends Component
{
    use WithPagination;

    public $nama, $nip, $id_user;

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
        $this->nip = $user['nip'];
        $this->id_user = $user['id_user'];

        $this->dispatchBrowserEvent('openUserDisableModal');
    }

    public function disable($id_user)
    {
        User::find($id_user)->update(['status' => 'nonaktif']);
        $this->dispatchBrowserEvent('closeUserDisableModal');
        $this->dispatchBrowserEvent('swalDisable');
    }
}
