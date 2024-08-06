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

// Routes for guests (non-authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Routes for Kaprodi
    Route::middleware(['must-kaprodi'])->group(function () {
        Route::group(['prefix' => 'kaprodi'], function () {
            Route::get('/', [KaprodiController::class, 'index'])->name('kaprodi.index');

            Route::group(['prefix' => 'dosen'], function () {
                Route::get('/', [DosenController::class, 'dosenIndex'])->name('kaprodi.dosen.index');
                Route::get('/create', [DosenController::class, 'dosenCreate'])->name('kaprodi.dosen.create');
                Route::post('/', [DosenController::class, 'dosenStore'])->name('kaprodi.dosen.store');
                Route::get('/{id}', [DosenController::class, 'dosenEdit'])->name('kaprodi.dosen.edit');
                Route::post('/dosen/{id}/update', [DosenController::class, 'dosenUpdate'])->name('kaprodi.dosen.update');
                Route::delete('/{id}', [DosenController::class, 'dosenDelete'])->name('kaprodi.dosen.delete');
            });

            Route::group(['prefix' => 'kelas'], function () {
                Route::get('/', [KelasController::class, 'kelasIndex'])->name('kaprodi.kelas.index');
                Route::get('/detail/{id}', [KelasController::class, 'showKelas'])->name('kaprodi.kelas.show');
                Route::get('/create', [KelasController::class, 'kelasCreate'])->name('kaprodi.kelas.create');
                Route::post('/', [KelasController::class, 'kelasStore'])->name('kaprodi.kelas.store');
                Route::get('/{id}', [KelasController::class, 'kelasEdit'])->name('kaprodi.kelas.edit');
                Route::put('/kelas/{id}/update', [KelasController::class, 'kelasUpdate'])->name('kaprodi.kelas.update');
                Route::delete('/{id}', [KelasController::class, 'kelasDelete'])->name('kaprodi.kelas.delete');
            });
        });
    });

    // Routes for Dosen
    Route::middleware(['must-dosenwali'])->group(function () {
        Route::group(['prefix' => 'dosenwali'], function () {
            Route::get('/', [DosenController::class, 'dashboard'])->name('dosen.index');

            Route::group(['prefix' => 'mahasiswa'], function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('dosen.mahasiswa.index');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('dosen.mahasiswa.create');
                Route::post('/', [MahasiswaController::class, 'store'])->name('dosen.mahasiswa.store');
                Route::get('/{id}', [MahasiswaController::class, 'edit'])->name('dosen.mahasiswa.edit');
                Route::post('/update/{id}', [MahasiswaController::class, 'update'])->name('dosen.mahasiswa.update');
                Route::delete('/{id}', [MahasiswaController::class, 'delete'])->name('dosen.mahasiswa.delete');
                Route::get('/detail/{id}', [MahasiswaController::class, 'show'])->name('dosen.mahasiswa.detail');
            });

            Route::group(['prefix' => 'myclass'], function () {
                Route::get('/', [DosenController::class, 'myclass'])->name('dosen.myclass');
            });

            Route::group(['prefix' => 'requests'], function () {
                Route::get('/', [DosenController::class, 'indexRequest'])->name('dosen.requests');
                Route::post('/approve/{requestId}', [DosenController::class, 'approveRequest'])->name('dosen.requests.approve');
                Route::post('/reject/{requestId}', [DosenController::class, 'rejectRequest'])->name('dosen.requests.reject');
            });
        });
    });

    // Routes for Mahasiswa
    Route::middleware(['must-mahasiswa'])->group(function () {
        Route::group(['prefix' => 'mahasiswa'], function () {
            Route::get('/', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
            Route::get('/myclass', [MahasiswaController::class, 'myclass'])->name('mahasiswa.myclass');

            Route::get('/request/edit', [MahasiswaController::class, 'requestEdit'])->name('mahasiswa.request.edit');
            Route::post('/request/edit', [MahasiswaController::class, 'submitRequestEdit'])->name('mahasiswa.submit.request.edit');
            
            Route::get('/edit', [MahasiswaController::class, 'editByMahasiswa'])->name('mahasiswa.edit');
            Route::post('/update', [MahasiswaController::class, 'updateByMahasiswa'])->name('mahasiswa.update');
        });
    });
});