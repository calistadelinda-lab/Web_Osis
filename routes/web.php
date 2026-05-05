<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranAnggotaController;
use App\Http\Controllers\PendaftaranKetuaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pendaftaran-osis', function () {
    return view('formulir');
})->name('pendaftaran-osis');


Route::post('/pendaftaran-osis/anggota', [PendaftaranAnggotaController::class, 'store'])->name('pendaftaran-anggota.store');
Route::post('/pendaftaran-osis/ketua', [PendaftaranKetuaController::class, 'store'])->name('pendaftaran-ketua.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/voting', function () {
    return view('voting');
})->middleware(['auth'])->name('vote');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
