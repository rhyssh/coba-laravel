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







    
