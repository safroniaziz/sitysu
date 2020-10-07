<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeteranganController extends Controller
{
    public function index()
    {
        return view('pages.surat-keterangan.index');
    }
}
