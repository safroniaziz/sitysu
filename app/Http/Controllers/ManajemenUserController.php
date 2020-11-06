<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\UnitKerja;
use App\Models\User;


class ManajemenUserController extends Controller
{
    public function index()
    {
        return view('pages.manajemen-user.index');
    }

    public function create()
    {
        $unit_kerja = UnitKerja::get();

        return view('pages.manajemen-user.create', compact('unit_kerja'));
    }

    public function store(UserRequest $request)
    {
        $user = $request->validated();
        $user['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user['status'] = 'aktif';

        User::create($user);

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
