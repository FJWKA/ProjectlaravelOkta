<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ManajemenController;

Route::get('/', [ManajemenController::class, 'index'])->name('manajemen.index');

Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
Route::post('/pemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');




