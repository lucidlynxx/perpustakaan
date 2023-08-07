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

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });
});

Route::get('/', [LoginController::class, 'home']);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/data-siswa', SiswaController::class)->except('destroy');

    Route::controller(AdministratorController::class)->group(function () {
        Route::get('/data-administrator', 'index');
        Route::get('/data-administrator/create', 'create');
        Route::post('/data-administrator', 'store');
    });

    Route::resource('/data-buku', BukuController::class)->except('destroy');

    Route::resource('/data-rak', RakController::class)->except('destroy', 'show');

    Route::resource('/data-peminjaman', PeminjamanController::class)->except('destroy', 'show', 'edit', 'update');
    Route::controller(PeminjamanController::class)->group(function () {
        Route::get('/data-peminjaman/{peminjaman:slug}', 'menyerahkan');
        Route::get('/data-peminjaman/{peminjaman:slug}/perpanjang', 'perpanjang');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::get('/data-laporan', 'index');
        Route::get('/print/siswa', 'printSiswa');
        Route::get('/print/administrator', 'printUser');
        Route::get('/print/buku', 'printBuku');
        Route::get('/print/rak', 'printRak');
        Route::get('/print/peminjaman', 'printPeminjaman');
        Route::get('/print/pinjam', 'pinjam');
        Route::get('/print/kembali', 'kembali');
    });

    Route::post('/logout', [LoginController::class, 'logout']);
});
