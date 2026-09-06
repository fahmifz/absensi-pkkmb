<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsensiController;

Route::get('/absensi', [AbsensiController::class, 'create'])
    ->name('absensi.create');

Route::post('/absensi', [AbsensiController::class, 'store'])
    ->name('absensi.store');

Route::get('/admin/absensi', [AbsensiController::class, 'index'])
    ->name('absensi.index');

Route::get('/admin/absensi/print', [AbsensiController::class, 'print'])
    ->name('absensi.print');

    Route::delete('/admin/absensi/{id}', [AbsensiController::class, 'destroy'])
    ->name('absensi.destroy');

    Route::get('/admin/absensi/qr-code', function () {
    return view('absensi.qrcode');
})->name('absensi.qrcode');