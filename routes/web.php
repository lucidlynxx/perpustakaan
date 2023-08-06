<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RakController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/data-siswa', SiswaController::class)->except('destroy')->middleware('auth');

Route::controller(AdministratorController::class)->group(function () {
    Route::get('/dashboard/data-administrator', 'index')->middleware('auth');
    Route::get('/dashboard/data-administrator/create', 'create')->middleware('auth');
    Route::post('/dashboard/data-administrator', 'store')->middleware('auth');
});

Route::resource('/dashboard/data-buku', BukuController::class)->except('destroy')->middleware('auth');

Route::resource('/dashboard/data-rak', RakController::class)->except('destroy', 'show')->middleware('auth');
Route::controller(RakController::class)->group(function () {
    Route::get('/dashboard/data-rak/buatSlug2', 'buatSlug2')->middleware('auth');
});

Route::resource('/dashboard/data-peminjaman', PeminjamanController::class)->except('destroy', 'show', 'edit', 'update')->middleware('auth');
Route::controller(PeminjamanController::class)->group(function () {
    Route::get('/dashboard/data-peminjaman/{peminjaman:slug}', 'menyerahkan')->middleware('auth');
    Route::get('/dashboard/data-peminjaman/{peminjaman:slug}/perpanjang', 'perpanjang')->middleware('auth');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/dashboard/data-laporan', 'index')->middleware('auth');
    Route::get('/dashboard/print/siswa', 'printSiswa')->middleware('auth');
    Route::get('/dashboard/print/administrator', 'printUser')->middleware('auth');
    Route::get('/dashboard/print/buku', 'printBuku')->middleware('auth');
    Route::get('/dashboard/print/rak', 'printRak')->middleware('auth');
    Route::get('/dashboard/print/peminjaman', 'printPeminjaman')->middleware('auth');
    Route::get('/dashboard/print/pinjam', 'pinjam')->middleware('auth');
    Route::get('/dashboard/print/kembali', 'kembali')->middleware('auth');
});
