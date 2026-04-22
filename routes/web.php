<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranKetuaController;
use App\Http\Controllers\PendaftaranAnggotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/views', function () {
    return view('formulir');
});

Route::post('/pendaftaran-ketua', [PendaftaranKetuaController::class, 'store'])->name('pendaftaran-ketua.store');
Route::post('/pendaftaran-anggota', [PendaftaranAnggotaController::class, 'store'])->name('pendaftaran-anggota.store');
