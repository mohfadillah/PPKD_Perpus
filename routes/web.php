<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

// Route::middleware(['auth', 'Administrator'])->group(function () {
//     Route::get('user', [UserController::class, 'index']);
// });
