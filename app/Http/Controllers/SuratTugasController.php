<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratRequest;
use App\Models\Document;

class SuratTugasController extends Controller
{
    public function index()
    {
        return view('pages.surat-tugas.index');
    }

    public function create()
    {
        return view('pages.surat-tugas.create');
    }

    public function store(SuratRequest $request)
    {
        $data = $request->validated();

        $nama_file = $request->file->getClientOriginalName();
        $file = $request->file->storeAs('surat-tugas', $nama_file);
        $data['jenis_surat'] = 't';
        $data['file'] = $file;

        Document::create($data);

        return redirect()->route('surat.tugas')->with('success', 'Berhasil Dimasukkan.');
    }

    public function edit($no_surat)
    {
        $document = Document::where('no_surat', $no_surat)->first();

        return view('pages.surat-tugas.edit', compact('document'));
    }

    public function update(SuratRequest $request, $id)
    {
        $surat = Document::where('id', $id)->first();

        $surat->update($request->validated());

        return redirect()->route('surat.tugas')->with('success', 'Berhasil Diubah.');
    }

    public function detail($no_surat)
    {
        $document = Document::where('no_surat', $no_surat)->first();

        return view('pages.surat-tugas.detail', compact('document'));
    }
}
