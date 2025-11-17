<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PromotionController;

Route::get('/', function (){
    return view('welcome');
});


Route::get('/dashboard', function (){
    return view('admin.dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// data peternak-admin
Route::get('/resident', [ResidentController::class, 'index']);
Route::get('/resident/create', [ResidentController::class, 'create']);
Route::get('/resident/{$id}', [ResidentController::class, 'edit']);
Route::post('/resident', [ResidentController::class, 'store']);
Route::post('/resident/{$id}', [ResidentController::class, 'update']);
Route::delete('/resident/{$id}', [ResidentController::class, 'delete']);

// data promosi-admin
Route::resource('promotions', PromotionController::class);
