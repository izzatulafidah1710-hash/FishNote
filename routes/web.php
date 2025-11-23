<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\InfoAkunController;
use App\Http\Controllers\PeternakActivityController;
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

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

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

// login


