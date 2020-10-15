<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;


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

    public function store(UserRequest $request)
    {
        $user = $request->validated();
        $user['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        User::create($user);

        return redirect()->route('manajemen.user')->with('success', 'Berhasil Ditambahkan.');
    }

    public function edit($nip_nidn)
    {
        $user = User::where('nip_nidn', $nip_nidn)->first();

        return view('pages.manajemen-user.edit', compact('user'));
    }

    public function update(UserRequest $request, $nip_nidn)
    {
        $user = User::where('nip_nidn', $nip_nidn)->first();

        $user->update($request->validated());

        return redirect()->route('manajemen.user')->with('success', 'Berhasil Diubah.');
    }

    public function changePassword()
    {
        return view('pages.manajemen-user.ubah-password');
    }
}
