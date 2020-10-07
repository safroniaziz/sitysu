<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratTugasRequest;
use Illuminate\Http\Request;

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
        dd($request->validated());
    }
}
