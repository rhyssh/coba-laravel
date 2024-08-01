<?php

use Illuminate\Support\Facades\Route;

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