<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TinhThanhController;
use App\Http\Controllers\Backend\DiaDiemController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Tỉnh thành
Route::get('tinhthanh', [TinhThanhController::class, 'index'])->name('tinhthanh.index');
Route::get('tinhthanh/create', [TinhThanhController::class, 'create'])->name('tinhthanh.create');
Route::post('tinhthanh', [TinhThanhController::class, 'store'])->name('tinhthanh.store');
Route::get('tinhthanh/{tinhthanh}/', [TinhThanhController::class, 'show'])->name('tinhthanh.show');
Route::get('tinhthanh/{tinhthanh}/edit', [TinhThanhController::class, 'edit'])->name('tinhthanh.edit');
Route::patch('tinhthanh/{tinhthanh}/', [TinhThanhController::class, 'update'])->name('tinhthanh.update');
Route::delete('tinhthanh/{tinhthanh}/', [TinhThanhController::class, 'destroy'])->name('tinhthanh.destroy');

// Route Địa điểm
Route::get('diadiem', [DiaDiemController::class, 'index'])->name('diadiem.index');
Route::get('diadiem/create', [DiaDiemController::class, 'create'])->name('diadiem.create');
Route::post('diadiem', [DiaDiemController::class, 'store'])->name('diadiem.store');
Route::get('diadiem/{diadiem}/', [DiaDiemController::class, 'show'])->name('diadiem.show');
Route::get('diadiem/{diadiem}/edit', [DiaDiemController::class, 'edit'])->name('diadiem.edit');
Route::patch('diadiem/{diadiem}/', [DiaDiemController::class, 'update'])->name('diadiem.update');
Route::delete('diadiem/{diadiem}/', [DiaDiemController::class, 'destroy'])->name('diadiem.destroy');

