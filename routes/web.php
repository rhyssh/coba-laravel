<?php
use Illuminate\Support\Facades\Route;
use App\Models\FakeDataMk;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Comment out or remove the middleware for guest and auth for testing
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);



Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.detail');
    Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::post('/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
});

Route::get('/dashboarddosen', function () {
    return view('Dosen.dashboard');
});

Route::get('/detailclass', function () {
    return view('class.show');
})->name('detail.class');

Route::get('/datamahasiswa', function () {
    return view('Dosen.datamhs');
});

Route::get('/detailmhs', function () {
    return view('Dosen.detailmhs');
})->name('detailmhs');

Route::get('/editmhs', function () {
    return view('Dosen.editdatamhs');
})->name('editmhs');

Route::get('/pengajuanmhs', function () {
    return view('Dosen.pengajuanmhs');
})->name('ajumhs');

Route::get('/kelas', function () {
    return view('Mahasiswa.kelas');
})->name('mhs.kelas');
Route::get('/edit-data', function () {
    return view('Mahasiswa.edit');
})->name('mhs.edit-data');

Route::get('/mata-kuliah/{id}', function ($id) {
    return view('Mahasiswa.detailMk', [
        "data" => FakeDataMk::getById($id),
    ]);
})->name('mhs.detailMk');
