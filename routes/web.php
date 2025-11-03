<?php

use App\Http\Controllers\ViewData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\JadwalPosyanduController;

// register view
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// view login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (sesuai role ya)
Route::middleware(['auth', 'role:kader'])->prefix('kader')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'kader'])->name('kader.dashboard');
});

Route::middleware(['auth', 'role:pengguna'])->prefix('pengguna')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'pengguna'])->name('pengguna.dashboard');
});
// Menampilkan Data Peserta yang Terdaftar ya
Route::get('/data', [ViewData::class, 'index'])->name('view.data');

// Update data
Route::get('/peserta/edit/{kategori}/{id}', [PesertaController::class, 'edit'])->name('peserta.edit');
Route::put('/peserta/update/{kategori}/{id}', [PesertaController::class, 'update'])->name('peserta.update');


// form input data
Route::get('/data/tambah', [PesertaController::class, 'create'])->name('peserta.create');
Route::post('/data/store', [PesertaController::class, 'store'])->name('peserta.store');
Route::delete('/peserta/{kategori}/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');

// view pemeriksaan
Route::get('/pemeriksaan', [PemeriksaanController::class, 'index'])->name('pemeriksaan.index');

Route::get('/pemeriksaan/create', [PemeriksaanController::class, 'create'])->name('pemeriksaan.create');
Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
Route::get('/pemeriksaan/search', [PemeriksaanController::class, 'searchPeserta'])->name('pemeriksaan.search');

// Hapus pemeriksaan
Route::delete('/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');

// jadwal
Route::get('/jadwal/create', [JadwalPosyanduController::class, 'create'])->name('jadwal.create');
Route::post('/jadwal', [JadwalPosyanduController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{id}/edit', [JadwalPosyanduController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/{id}', [JadwalPosyanduController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{id}', [JadwalPosyanduController::class, 'destroy'])->name('jadwal.destroy');

Route::get('/jadwal/{id}', [JadwalPosyanduController::class, 'show'])->name('jadwal.show');

// buatkan view function 
Route::get('/laporan', function () {
    return view('kader.laporan.index');
});

