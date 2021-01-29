<?php

namespace App\Http\Controllers;

use App\Models\PenerimaSurat;
use App\Models\Surat;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $nip = Auth::id();

        $surat_keputusan = Surat::where('jenis_surat', 'Surat Keputusan')->count();
        $surat_tugas = Surat::where('jenis_surat', 'Surat Tugas')->count();

        $surat_user = PenerimaSurat::where('nip', $nip)->count();

        $jumlah_user = User::count();
        $user_aktif = User::where('status', 'aktif')->count();

        $satuan_kerja = UnitKerja::count();

        return view('beranda', compact(
            'surat_tugas',
            'surat_keputusan',
            'surat_user',
            'jumlah_user',
            'user_aktif',
            'satuan_kerja'
        ));
    }
}
