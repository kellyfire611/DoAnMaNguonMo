<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TinhThanhController;

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

