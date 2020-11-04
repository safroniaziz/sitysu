<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratRequest;

use App\Models\Surat;

class SuratController extends Controller
{
    public function index()
    {
        return view('pages.surat.index');
    }

    public function create()
    {
        return view('pages.surat.create');
    }

    public function store(SuratRequest $request)
    {
        $data = $request->validated();

        $nama_file = $request->link_file->getClientOriginalName();
        $file = $request->link_file->storeAs('surat', $nama_file);
        $data['link_file'] = $file;
        $data['id_user'] = auth()->user()->id_user;

        Surat::create($data);

        return redirect()->route('surat')->with('success', 'Berhasil Dimasukkan.');
    }

    public function edit($no_surat)
    {
        $document = Surat::where('no_surat', $no_surat)->first();

        return view('pages.surat.edit', compact('document'));
    }

    public function update(SuratRequest $request, $id_surat)
    {
        $surat = Surat::where('id_surat', $id_surat)->first();

        $surat->update($request->validated());

        return redirect()->route('surat')->with('success', 'Berhasil Diubah.');
    }

    public function detail($no_surat)
    {
        $document = Surat::where('no_surat', $no_surat)->first();

        return view('pages.surat-tugas.detail', compact('document'));
    }
}
