<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratTugasRequest;
use App\Http\Requests\SuratTugasRequest;
use App\Models\Document;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class SuratTugasController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view('pages.surat-tugas.index', compact('documents'));
    }

    public function create()
    {
        return view('pages.surat-tugas.create');
    }

    public function store(SuratTugasRequest $request)
    {
        $data = $request->validated();

        $nama_file = $request->file->getClientOriginalName();
        $file = $request->file->storeAs('surat-tugas', $nama_file);
        $data['file'] = $file;

        Document::create($data);

        return redirect()->route('surat.tugas')->with('success', 'Lorem ipsum dolor sit amet.');
    }

    public function edit($no_surat)
    {
        $document = Document::where('no_surat', $no_surat)->first();

        return view('pages.surat-tugas.edit', compact('document'));
    }

    public function update(SuratTugasRequest $request, $id)
    {
        $surat = Document::where('id', $id)->first();

        $surat->save($request->validated());

        return redirect()->route('surat.tugas')->with('success', 'Berhasil Update Data.');
    }
}
