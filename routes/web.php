<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::get('/login', 'AuthPandaController@index')->name('login');
Route::post('/login', 'AuthPandaController@actionAuth')->name('login.panda');

Route::middleware(['auth', 'checkRole:admin,staf'])->group(function () {
    Route::get('/', 'BerandaController@index')->name('beranda');

    Route::get('/profil', 'ProfileController@index')->name('profil');

    Route::get('/ubah-password', 'ManajemenUserController@changePassword')->name('ubah.password');


    Route::get('/surat/index', 'SuratController@index')->name('surat');
});

Route::middleware(['auth', 'checkRole:admin,staf', 'checkInputSurat'])->group(function () {

    Route::get('/surat/create', 'SuratController@create')->name('surat.create');
    Route::post('/surat/store', 'SuratController@store')->name('surat.store');

    Route::get('/surat/{no_surat}/edit', 'SuratController@edit')->name('surat.edit');
    Route::patch('/surat/{id_surat}/update', 'SuratController@update')->name('surat.update');

    Route::get('/surat/{no_surat}/detail', 'SuratController@detail')->name('surat.detail');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/manajemen-user/satuan-kerja/index', 'SatuanKerjaController@index')->name('satuan.kerja');

    Route::get('/manajemen-user/riwayat-unit-kerja/index', 'RiwayatUnitKerjaController@index')->name('riwayat.unit.kerja');

    Route::get('/manajemen-user/data-user/index', 'ManajemenUserController@index')->name('manajemen.user');

    Route::post('/manajemen-user/data-user/store/{hak_akses}', 'ManajemenUserController@store')->name('manajemen.user.store');

    Route::get('/manajemen-user/data-user/create', 'ManajemenUserController@create')->name('manajemen.user.create');

    Route::get('/manajemen-user/data-user/create/dosen', 'ManajemenUserController@createDosen')->name('manajemen.user.create.dosen');
    Route::get('/manajemen-user/data-user/create/staf', 'ManajemenUserController@createStaf')->name('manajemen.user.create.staf');

    Route::get('/manajemen-user/data-user/{user}/edit', 'ManajemenUserController@edit')->name('manajemen.user.edit');
    Route::patch('/manajemen-user/data-user/{user}/update', 'ManajemenUserController@update')->name('manajemen.user.update');
});
