<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('meters', MeterController::class)->middleware('auth');

Route::resource('readings', ReadingController::class)->middleware('auth');

Route::resource('payments', PaymentController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/export/readings', [ExportController::class, 'exportReadingsToPDF'])->name('export.readings');

Route::get('/export/payments', [ExportController::class, 'exportPaymentsToPDF'])->name('export.payments');

require __DIR__.'/auth.php';
