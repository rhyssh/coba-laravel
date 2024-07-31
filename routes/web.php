<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/app', function () {
    return view('layout.app');
});

Route::get('/dashboardkaprodi', function () {
    return view('Kaprodi.dashboard');
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/overview', [OverviewController::class, 'index']);
Route::get('/kaprodi', [KaprodiController::class, 'index']);
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
