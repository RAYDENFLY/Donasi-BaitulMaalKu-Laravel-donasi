<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Program API Routes
Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'apiIndex'])->name('api.programs.index');
    Route::get('/{id}', [ProgramController::class, 'apiShow'])->name('api.programs.show');
});

// Campaign API Routes untuk Company Profile
Route::prefix('campaigns')->group(function () {
    Route::get('/', [ProgramController::class, 'apiCampaigns'])->name('api.campaigns.index');
    Route::get('/featured', [ProgramController::class, 'apiFeaturedCampaigns'])->name('api.campaigns.featured');
});

// Zakat API Routes
Route::prefix('zakat')->group(function () {
    Route::get('/{jenis?}', [ProgramController::class, 'apiZakat'])->name('api.zakat');
});
