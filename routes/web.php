<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return redirect('login');
});

// Comment out or remove the middleware for guest and auth for testing
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'kaprodi'], function () {
    Route::get('/', [KaprodiController::class, 'index'])->name('kaprodi');
    Route::get('/create', [KaprodiController::class, 'create'])->name('kaprodi.create');
    Route::post('/', [KaprodiController::class, 'store'])->name('kaprodi.store');
    Route::get('/{id}', [KaprodiController::class, 'edit'])->name('kaprodi.edit');
    Route::post('/update', [KaprodiController::class, 'update'])->name('kaprodi.update');
    Route::delete('/{id}', [KaprodiController::class, 'delete'])->name('kaprodi.delete');
});

Route::group(['prefix' => 'dosen'], function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen');
    Route::get('/class', [DosenController::class, 'class'])->name('dosen.class');
    Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::post('/update', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/{id}', [DosenController::class, 'delete'])->name('dosen.delete');
});

Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.detail');
    Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::post('/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
});
