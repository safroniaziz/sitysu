<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatUnitKerjaController extends Controller
{
    public function index()
    {
        return view('pages.manajemen-user.riwayat-unit-kerja');
    }
}
