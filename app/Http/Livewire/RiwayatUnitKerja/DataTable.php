<?php

namespace App\Http\Livewire\RiwayatUnitKerja;

use App\Models\RiwayatUnitKerja;
use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class DataTable extends Component
{
    public $tanggal_berakhir, $nama_user, $nip;

    public function render()
    {
        $riwayat_unit_kerja = RiwayatUnitKerja::with('user', 'unitkerja')->latest()->get();

        return view('livewire.riwayat-unit-kerja.data-table', compact('riwayat_unit_kerja'));
    }

    public function openModal($nip)
    {
        $user = User::where('nip', $nip)->first();

        $this->nama_user = $user->nama;
        $this->tanggal_berakhir = $user->riwayatUnitKerja->tanggal_berakhir;
        $this->nip = $user->nip;

        $this->dispatchBrowserEvent('openNonActiveUser');
    }

    public function nonActive($nip)
    {
        User::where('nip', $nip)->update(['input_surat' => 'tidak']);
        RiwayatUnitKerja::where('nip', $nip)->update(['status' => 'tidak']);

        $this->dispatchBrowserEvent('closeNonActiveUser');
    }
}
