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
                Route::get('/', [KaprodiController::class, 'dosenIndex'])->name('kaprodi.dosen.index');
                Route::get('/', [DosenController::class, 'dosenIndex'])->name('kaprodi.dosen.index');
                Route::get('/create', [DosenController::class, 'dosenCreate'])->name('kaprodi.dosen.create');
                Route::post('/', [DosenController::class, 'dosenStore'])->name('kaprodi.dosen.store');
                Route::get('/{id}', [DosenController::class, 'dosenEdit'])->name('kaprodi.dosen.edit');
                Route::post('/dosen/{id}/update', [DosenController::class, 'dosenUpdate'])->name('kaprodi.dosen.update');
                Route::delete('/{id}', [DosenController::class, 'dosenDelete'])->name('kaprodi.dosen.delete');
            });
            Route::group(['prefix' => 'class'], function () {
                Route::get('/', [KaprodiController::class, 'classIndex'])->name('kaprodi.class.index');
                Route::get('/create', [KaprodiController::class, 'classCreate'])->name('kaprodi.class.create');
                Route::post('/', [KaprodiController::class, 'classStore'])->name('kaprodi.class.store');
                Route::get('/{id}', [KaprodiController::class, 'classEdit'])->name('kaprodi.class.edit');
                Route::post('/update', [KaprodiController::class, 'classUpdate'])->name('kaprodi.class.update');
                Route::delete('/{id}', [KaprodiController::class, 'classDelete'])->name('kaprodi.class.delete');
            });
        });
    });

    // Routes for Dosen
    Route::middleware(['must-dosenwali'])->group(function () {
        Route::group(['prefix' => 'dosenwali'], function () {
            Route::get('/', [DosenController::class, 'dashboard'])->name('dosen.index');

            Route::group(['prefix' => 'mahasiswa'], function () {
                Route::get('/', [DosenController::class, 'mahasiswaIndex'])->name('dosen.mahasiswa.index');
                Route::get('/create', [DosenController::class, 'mahasiswaCreate'])->name('dosen.mahasiswa.create');
                Route::post('/', [DosenController::class, 'mahasiswaStore'])->name('dosen.mahasiswa.store');
                Route::get('/{id}', [DosenController::class, 'mahasiswaEdit'])->name('dosen.mahasiswa.edit');
                Route::post('/update', [DosenController::class, 'mahasiswaUpdate'])->name('dosen.mahasiswa.update');
                Route::delete('/{id}', [DosenController::class, 'mahasiswaDelete'])->name('dosen.mahasiswa.delete');
            });

            Route::group(['prefix' => 'kelas'], function () {
                Route::get('/', [DosenController::class, 'kelasIndex'])->name('dosen.kelas.index');
                Route::get('/create', [DosenController::class, 'kelasCreate'])->name('dosen.kelas.create');
                Route::post('/', [DosenController::class, 'kelasStore'])->name('dosen.kelas.store');
                Route::get('/{id}', [DosenController::class, 'kelasEdit'])->name('dosen.kelas.edit');
                Route::post('/update', [DosenController::class, 'kelasUpdate'])->name('dosen.kelas.update');
                Route::delete('/{id}', [DosenController::class, 'kelasDelete'])->name('dosen.kelas.delete');
                Route::get('/', [KelasController::class, 'kelasIndex'])->name('dosen.kelas.index');
                Route::get('/create', [KelasController::class, 'kelasCreate'])->name('dosen.kelas.create');
                Route::post('/', [KelasController::class, 'kelasStore'])->name('dosen.kelas.store');
                Route::get('/{id}', [KelasController::class, 'kelasEdit'])->name('dosen.kelas.edit');
                Route::post('/update', [KelasController::class, 'kelasUpdate'])->name('dosen.kelas.update');
                Route::delete('/{id}', [KelasController::class, 'kelasDelete'])->name('dosen.kelas.delete');
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
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        
            // Route untuk melihat data sendiri
            Route::get('/myprofile', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
            
            // Route untuk request edit data
            Route::get('/request/edit', [MahasiswaController::class, 'requestEdit'])->name('mahasiswa.request.edit');
            Route::post('/request/edit', [MahasiswaController::class, 'submitRequestEdit'])->name('mahasiswa.submit.request.edit');
        });
    });
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