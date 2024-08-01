<?php

use Illuminate\Support\Facades\Route;
use App\Models\FakeDataMk;

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

//mahasiswa 
Route::get('/dashboardmahasiswa', function () {
    return view('Mahasiswa.dashboard');
})->name('mhs.dashboard');

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
