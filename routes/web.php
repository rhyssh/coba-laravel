<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

// Redirect to login if visiting the root URL
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
    // Route::middleware('role:kaprodi')->group(function () {
        Route::group(['prefix' => 'kaprodi'], function () {
            Route::get('/', [KaprodiController::class, 'index'])->name('kaprodi.index');

            Route::group(['prefix' => 'dosen'], function () {
                Route::get('/', [KaprodiController::class, 'dosenIndex'])->name('kaprodi.dosen.index');
                Route::get('/create', [DosenController::class, 'dosenCreate'])->name('kaprodi.dosen.create');
                Route::post('/', [DosenController::class, 'dosenStore'])->name('kaprodi.dosen.store');
                Route::get('/{id}', [DosenController::class, 'dosenEdit'])->name('kaprodi.dosen.edit');
                Route::post('/dosen/{id}/update', [DosenController::class, 'dosenUpdate'])->name('kaprodi.dosen.update');
                Route::delete('/{id}', [DosenController::class, 'dosenDelete'])->name('kaprodi.dosen.delete');
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
    // });

    // Routes for Dosen
    // Route::middleware('role:dosen')->group(function () {
        Route::group(['prefix' => 'dosen'], function () {
            Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
            
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
            });
            
            Route::group(['prefix' => 'requests'], function () {
                Route::get('/', [DosenController::class, 'indexRequest'])->name('dosen.requests');
                Route::post('/approve/{requestId}', [DosenController::class, 'approveRequest'])->name('dosen.requests.approve');
                Route::post('/reject/{requestId}', [DosenController::class, 'rejectRequest'])->name('dosen.requests.reject');
            });
        });
    // });

    // Routes for Mahasiswa
    // Route::middleware('role:mahasiswa')->group(function () {
        Route::group(['prefix' => 'mahasiswa'], function () {
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        
            // Route untuk melihat data sendiri
            Route::get('/show', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
            
            // Route untuk request edit data
            Route::get('/request/edit', [MahasiswaController::class, 'requestEdit'])->name('mahasiswa.request.edit');
            Route::post('/request/edit', [MahasiswaController::class, 'submitRequestEdit'])->name('mahasiswa.submit.request.edit');
        });
    // });


});
Route::get('/dashboard', function () {
    return view('Kaprodi.dashboard');
})->name('kaprodi.dashboard');

Route::get('/dosen', function () {
    return view('Kaprodi.dosen');
});

Route::get('/detail-dosen', function () {
    return view('Kaprodi.detailDosen');
})->name('kaprodi.dosen');

Route::get('/detail-class', function () {
    return view('Kaprodi.classDetail');
})->name('kaprodi.class');

Route::get('/edit-dosen', function () {
    return view('Kaprodi.editDosen');
})->name('kaprodi.editdosen');

Route::get('/edit-class', function () {
    return view('Kaprodi.editClass');
})->name('kaprodi.editclass');

Route::get('/create-class', function () {
    return view('Kaprodi.createClass');
})->name('kaprodi.createClass');

Route::get('/create-dosen', function () {
    return view('Kaprodi.createDosen');
})->name('kaprodi.createDosen');
Route::get('/login', [LoginController::class, 'index']);
Route::get('/kaprodi', [KaprodiController::class, 'index']);
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/dashboarddosen', function () {
    return view('Dosen.dashboard');
});

Route::get('/detailclass', function () {
    return view('Dosen.class_detail');
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
Route::get('/dashboard', function () {
    return view('Kaprodi.dashboard');
})->name('kaprodi.dashboard');

Route::get('/dosen', function () {
    return view('Kaprodi.dosen');
});

Route::get('/detail-dosen', function () {
    return view('Kaprodi.detailDosen');
})->name('kaprodi.dosen');

Route::get('/detail-class', function () {
    return view('Kaprodi.classDetail');
})->name('kaprodi.class');

Route::get('/edit-dosen', function () {
    return view('Kaprodi.editDosen');
})->name('kaprodi.editdosen');

Route::get('/edit-class', function () {
    return view('Kaprodi.editClass');
})->name('kaprodi.editclass');

Route::get('/create-class', function () {
    return view('Kaprodi.createClass');
})->name('kaprodi.createClass');

Route::get('/create-dosen', function () {
    return view('Kaprodi.createDosen');
})->name('kaprodi.createDosen');

Route::get('/login', [LoginController::class, 'index']);
Route::get('/kaprodi', [KaprodiController::class, 'index']);
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/dashboarddosen', function () {
    return view('Dosen.dashboard');
});

Route::get('/detailclass', function () {
    return view('Dosen.class_detail');
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
