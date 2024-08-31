<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataKepsekController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuratPanggilanController;
use App\Http\Controllers\SuratPindahController;
use App\Http\Controllers\SuratTerimaController;
use App\Http\Controllers\SuratUndanganController;
use App\Http\Controllers\TahunAjaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('kontakadminpage');
    Route::resource('dashboard', DashboardController::class);
    Route::resource('setting', SettingController::class);
    Route::post('image-upload', [SettingController::class, 'storeImage'])->name('image.upload');
    Route::resource('data_admin', DataAdminController::class);
    Route::resource('undangan', SuratUndanganController::class);
    Route::resource('pindah', SuratPindahController::class);
    Route::resource('tahun_ajaran', TahunAjaranController::class);
    Route::resource('data_kepsek', DataKepsekController::class);
    Route::resource('data_kelas', KelasController::class);
    Route::resource('panggilan', SuratPanggilanController::class);
    Route::resource('surat_terima', SuratTerimaController::class);

});
