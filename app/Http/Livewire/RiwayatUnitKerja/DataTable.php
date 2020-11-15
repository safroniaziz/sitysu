<?php

namespace App\Http\Livewire\RiwayatUnitKerja;

use App\Models\RiwayatUnitKerja;
use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class DataTable extends Component
{
    public $tanggal_berakhir, $nama_user, $id_user;

    public function render()
    {
        $riwayat_unit_kerja = RiwayatUnitKerja::with('user', 'unitkerja')->latest()->get();

        return view('livewire.riwayat-unit-kerja.data-table', compact('riwayat_unit_kerja'));
    }

    public function openModal($id_user)
    {
        $user = User::where('id_user', $id_user)->first();

        $this->nama_user = $user->nama;
        $this->tanggal_berakhir = $user->riwayatUnitKerja->tanggal_berakhir;
        $this->id_user = $user->id_user;

        $this->dispatchBrowserEvent('openNonActiveUser');
    }

    public function nonActive($id_user)
    {
        User::where('id_user', $id_user)->update(['input_surat' => 'tidak']);
        RiwayatUnitKerja::where('id_user', $id_user)->update(['status' => 'tidak']);

        $this->dispatchBrowserEvent('closeNonActiveUser');
    }
}
