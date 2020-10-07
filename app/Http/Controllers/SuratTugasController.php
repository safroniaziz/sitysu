<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratTugasRequest;
use App\Models\Document;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(SuratTugasRequest $request)
    {
        $data = $request->validated();

        $nama_file = $request->file->getClientOriginalName();
        $file = $request->file->storeAs('surat-tugas', $nama_file);
        $data['file'] = $file;

        Document::create($data);

        return redirect()->route('surat.tugas')->with('success', 'Lorem ipsum dolor sit amet.');
    }
}
