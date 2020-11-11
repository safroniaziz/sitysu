<?php

namespace App\Http\Livewire\RiwayatUnitKerja;

use App\Models\RiwayatUnitKerja;
use Livewire\Component;

class DataTable extends Component
{
    public $search;

    public function render()
    {
        $riwayat_unit_kerja = RiwayatUnitKerja::with('user', 'unitkerja')->latest()->get();

        return view('livewire.riwayat-unit-kerja.data-table', compact('riwayat_unit_kerja'));
    }
}
