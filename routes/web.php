<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\KtpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ktp', [KtpController::class, 'index'])->name('ktp.index');
    
    Route::get('/ktp/export/csv', [KtpController::class, 'exportCSV'])->name('ktp.export.csv');
    Route::get('/ktp/export/pdf', [KtpController::class, 'exportPDF'])->name('ktp.export.pdf');
});


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/ktp/create', [KtpController::class, 'create'])->name('ktp.create');
    Route::post('/ktp', [KtpController::class, 'store'])->name('ktp.store');

    Route::get('/ktp/{id}/edit', [KtpController::class, 'edit'])->name('ktp.edit');
    Route::put('/ktp/{id}', [KtpController::class, 'update'])->name('ktp.update');

    Route::delete('/ktp/{id}', [KtpController::class, 'destroy'])->name('ktp.destroy');

    Route::post('/ktp/import', [KtpController::class, 'import'])->name('ktp.import');

    Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ktp/{id}', [KtpController::class, 'show'])->name('ktp.show');
});

require __DIR__.'/auth.php';
