<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatuanKerjaController extends Controller
{
    public function index()
    {
        return view('pages.satuan-kerja.index');
    }
}
