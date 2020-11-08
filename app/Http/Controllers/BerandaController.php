<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $surat_keputusan = Surat::where('jenis_surat', 'Surat Keputusan')->count();
        $surat_tugas = Surat::where('jenis_surat', 'Surat Tugas')->count();

        $jumlah_user = User::count();
        $user_aktif = User::where('status', 'aktif')->count();

        $satuan_kerja = UnitKerja::count();

        return view('beranda', compact(
            'surat_tugas',
            'surat_keputusan',
            'jumlah_user',
            'user_aktif',
            'satuan_kerja'
        ));
    }
}
