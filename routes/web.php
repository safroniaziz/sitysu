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
    Route::get('/beranda', 'BerandaController@index')->name('beranda');
});

Route::middleware(['auth', 'checkRole:admin,dosen'])->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');
});
