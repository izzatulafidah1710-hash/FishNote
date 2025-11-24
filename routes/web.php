<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\InfoAkunController;
use App\Http\Controllers\PeternakActivityController;
use App\Http\Controllers\User\PencatatanController;
use App\Http\Controllers\User\DataPanenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function (){
    return view('welcome');
});

Route::get('/dashboardadmin', function (){
    return view('admin.dashboardadmin');
});

Route::get('/dashboarduser', function (){
    return view('user.dashboarduser');
});

// Dashboard admin
Route::get('/admin', function () {
    return view('admin.dashboardadmin');
})->name('admin.dashboardadmin');

 // Dashboard peternak
Route::get('/user', function () {
    return view('user.dashboarduser');
})->name('user.dashboarduser');

// data peternak-admin
Route::get('/datapeternak', [ResidentController::class, 'index']);
Route::get('/datapeternak/create', [ResidentController::class, 'create']);
Route::get('/datapeternak/{$id}', [ResidentController::class, 'edit']);
Route::post('/datapeternak', [ResidentController::class, 'store']);
Route::post('/datapeternak/{$id}', [ResidentController::class, 'update']);
Route::delete('/datapeternak/{$id}', [ResidentController::class, 'delete']);

// data promosi-admin
Route::resource('datapromosi', PromotionController::class);

// info akun peternak
Route::get('/infoakunpeternak', [InfoAkunController::class, 'index'])
    ->name('infoakun.index');

Route::get('/infoakunpeternak/create', [InfoAkunController::class, 'create'])
    ->name('infoakun.create');

Route::post('/infoakunpeternak', [InfoAkunController::class, 'store'])
    ->name('infoakun.store');

Route::get('/infoakunpeternak/{id}/edit', [InfoAkunController::class, 'edit'])
    ->name('infoakun.edit');

Route::put('/infoakunpeternak/{id}', [InfoAkunController::class, 'update'])
    ->name('infoakun.update');

Route::delete('/infoakunpeternak/{id}', [InfoAkunController::class, 'destroy'])
    ->name('infoakun.destroy');

// aktivitas akun peternak
Route::get('/aktivitas', [PeternakActivityController::class, 'index'])->name('aktivitas.index');
Route::post('/aktivitas', [PeternakActivityController::class, 'store'])->name('aktivitas.store');
Route::delete('/aktivitas/{id}', [PeternakActivityController::class, 'destroy'])->name('aktivitas.delete');

// pencatatan peternak/user
Route::prefix('user')->name('user.')->group(function () {
    // pencatatan
    Route::resource('pencatatan', PencatatanController::class);
    // Nanti akan ditambahkan:
    // Route untuk Data Panen
    // Route untuk Promosi
    // Route untuk Laporan
    // Route untuk Riwayat Pencatatan
    // Route untuk Keluar
});

// data panen/user
Route::prefix('user')->name('user.')->group(function () {
    // Data Panen
    Route::resource('panen', DataPanenController::class);
    // Nanti akan ditambahkan:
    // Route untuk Promosi
    // Route untuk Laporan
    // Route untuk Riwayat Pencatatan
    // Route untuk Keluar
});


