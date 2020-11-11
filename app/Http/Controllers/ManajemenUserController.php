<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\RiwayatUnitKerja;
use App\Models\UnitKerja;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

use function GuzzleHttp\Psr7\uri_for;

class ManajemenUserController extends Controller
{
    public function index()
    {
        return view('pages.manajemen-user.index');
    }

    public function create()
    {
        return view('pages.manajemen-user.create');
    }

    public function createDosen()
    {
        $unit_kerja = UnitKerja::get();

        return view('pages.manajemen-user.dosen.create', compact('unit_kerja'));
    }

    public function createStaf()
    {
        $unit_kerja = UnitKerja::get();

        return view('pages.manajemen-user.staf.create', compact('unit_kerja'));
    }

    public function store(UserRequest $request, $hak_akses)
    {
        $admin = User::where('hak_akses', 'admin')->first();

        $data_user = $request->validated();
        $data_user['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $data_user['status'] = 'aktif';
        $data_user['hak_akses'] = $hak_akses;

        $user = User::create($data_user);

        if ($hak_akses == 'staf' && $request->input_surat == 'aktif') {
            $data = new RiwayatUnitKerja;

            $data->tanggal_berakhir = $request->tanggal_berakhir;
            $data->nip_pengubah = $admin->nip;
            $data->id_unit_kerja = $request->id_unit_kerja;

            $user->riwayatUnitKerja()->save($data);
        }

        return redirect()->route('manajemen.user')->with('success', 'Berhasil Ditambahkan.');
    }

    public function edit($nip)
    {
        $unit_kerja = UnitKerja::get();
        $user = User::where('nip', $nip)->first();

        return view('pages.manajemen-user.edit', compact('user', 'unit_kerja'));
    }

    public function update(UserRequest $request, $nip)
    {
        $user = User::where('nip', $nip)->first();

        $user->update($request->validated());

        return redirect()->route('manajemen.user')->with('success', 'Berhasil Diubah.');
    }

    public function changePassword()
    {
        return view('pages.manajemen-user.ubah-password');
    }
}
