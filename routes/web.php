<?php

use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('welcome');
});


Route::get('/dashboard', function (){
    return view('admin.dashboard');
});

// data peternak-admin
Route::get('/resident', [ResidentController::class, 'index']);
Route::get('/resident/create', [ResidentController::class, 'create']);
Route::get('/resident/{$id}', [ResidentController::class, 'edit']);
Route::post('/resident', [ResidentController::class, 'store']);
Route::post('/resident/{$id}', [ResidentController::class, 'update']);
Route::delete('/resident/{$id}', [ResidentController::class, 'delete']);

// data promosi-admin
Route::get('/promotion', [PromotionController::class, 'index']);