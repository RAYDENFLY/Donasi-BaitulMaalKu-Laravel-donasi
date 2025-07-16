<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Program;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Exports\VerifiedDonationsExport;
use Maatwebsite\Excel\Facades\Excel;

// Homepage (welcome page) menampilkan 3 campaign terbaru
Route::get('/', [HomeController::class, 'welcome']);

Route::get('/program/{id}', [ProgramController::class, 'show'])->name('program.show');

Route::get('/campaign', function () {
    return view('campaign');
});


Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.index');

Route::get('/zakat', function () {
    return view('zakat');
});

Route::get('/zakat/{jenis?}', [ProgramController::class, 'zakat']);


Route::get('/infaq', function (){
    return view('infaq');
});

Route::get('/wakaf', function (){
    return view('wakaf');
    });

Route::get('/wilayah', function () {
    $json = Storage::get('wilayah.json');
    return response()->json(json_decode($json, true));
});

Route::post('/donasi', [DonationController::class, 'store'])->name('donation.store');

Route::get('/donasi/invoice/{id}', [DonationController::class, 'invoice'])->name('donasi.invoice');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::resource('testimoni', \App\Http\Controllers\TestimoniController::class);
    Route::post('/donasi/{id}/update-status', [DonationController::class, 'updateStatus'])->name('donasi.updateStatus');
    Route::patch('/donasi/{id}/update-status', [DonationController::class, 'updateStatus'])->name('donasi.updateStatus');
    Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');
    Route::post('/program/{program}/close', [ProgramController::class, 'close'])->name('program.close');
    Route::post('/program/{program}/activate', [ProgramController::class, 'activate'])->name('program.activate');

    // di web.php
  // Payment Settings Routes
    Route::get('/settings', [PaymentSettingController::class, 'index'])->name('payment.index');
    Route::post('/payment/qris', [PaymentSettingController::class, 'storeQris'])->name('payment.qris.store');
    Route::post('/payment/bank', [PaymentSettingController::class, 'storeBank'])->name('payment.bank.store');
    Route::delete('/payment/qris/{id}', [PaymentSettingController::class, 'deleteQris'])->name('payment.deleteQris');
    Route::delete('/payment/bank/{id}', [PaymentSettingController::class, 'deleteBank'])->name('payment.deleteBank');


    Route::get('/history', [DonationController::class, 'manage'])->name('donasi.manage');


    Route::get('/reports', [DonationController::class, 'laporanBerhasil'])->name('reports.laporan');

    Route::get('/export-verified-donations', function () {
    return Excel::download(new VerifiedDonationsExport, 'donasi-terverifikasi.xlsx');
    })->name('donations.export');

    Route::get('/crm', [DonationController::class, 'crmIndex'])->name('crm.index');

    Route::delete('/donasi/{id}', [DonationController::class, 'destroy'])->name('donasi.destroy');

    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
