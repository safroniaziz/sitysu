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

    Route::get('/surat-tugas/{no_surat}/edit', 'SuratTugasController@edit')->name('surat.tugas.edit');
    Route::patch('/surat-tugas/{id}/update', 'SuratTugasController@update')->name('surat.tugas.update');

    Route::get('/surat-tugas/{no_surat}/detail', 'SuratTugasController@detail')->name('surat.tugas.detail');

    // Surat Keterangan
    Route::get('/surat-keterangan', 'SuratKeteranganController@index')->name('surat.keterangan');

    Route::get('/surat-keterangan/create', 'SuratKeteranganController@create')->name('surat.keterangan.create');
    Route::post('/surat-keterangan/store', 'SuratKeteranganController@store')->name('surat.keterangan.store');

    Route::get('/surat-keterangan/{no_surat}/edit', 'SuratKeteranganController@edit')->name('surat.keterangan.edit');
    Route::patch('/surat-keterangan/{id}/update', 'SuratKeteranganController@update')->name('surat.keterangan.update');

    Route::get('/surat-keterangan/{no_surat}/detail', 'SuratKeteranganController@detail')->name('surat.keterangan.detail');
});
