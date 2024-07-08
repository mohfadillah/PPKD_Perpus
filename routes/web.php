<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\DetailPeminjam;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index']);
Route::post('actionLogin', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('actionLogout', [\App\Http\Controllers\LoginController::class, 'actionLogout'])->name('actionLogout');

Route::resource('dashboard', DashboardController::class);
Route::resource('level', LevelController::class);
Route::resource('user', UserController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class);
Route::resource('peminjam', PeminjamController::class);

Route::get('/detail-pinjaman/{id}', [DetailController::class, 'show'])->name('detail-pinjaman.show');


// Route::get('Peminjaman', [TransaksiController::class, 'Peminjaman']);
// Route::get('tambahPeminjam', [TransaksiController::class, 'tambahPeminjam']);

// Route::middleware(['auth', 'Administrator'])->group(function () {
//     Route::get('user', [UserController::class, 'index']);
// });



