<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::middleware(['auth', 'checkRole:admin,dosen,staf'])->group(function () {
    Route::get('/', 'BerandaController@index')->name('beranda');
});

Route::middleware(['auth', 'checkRole:admin,staf'])->group(function () {
    // Surat Tugas
    Route::get('/surat-tugas', 'SuratTugasController@index')->name('surat.tugas');

    Route::get('/surat-tugas/create', 'SuratTugasController@create')->name('surat.tugas.create');
    Route::post('/surat-tugas/store', 'SuratTugasController@store')->name('surat.tugas.store');

    // Surat Keterangan
    Route::get('/surat-keterangan', 'SuratKeteranganController@index')->name('surat.keterangan');
});
