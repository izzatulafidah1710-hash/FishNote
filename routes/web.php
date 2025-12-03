<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\InfoAkunController;
use App\Http\Controllers\PeternakActivityController;
use App\Http\Controllers\User\PencatatanController;
use App\Http\Controllers\User\DataPanenController;
use App\Http\Controllers\User\PromosiController;
use App\Http\Controllers\User\DaftarPromosiController;
use App\Http\Controllers\User\LaporanController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\PromosiPublicController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\ProfileController as UserProfile;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

// about landing
Route::get('/about', function () {
    return view('about');
})->name('about');

// login
Route::get('/', function () {
    return redirect()->route('login');
});

// promosi public
Route::get('/promosi-public', [PromosiPublicController::class, 'index'])->name('promosi.public.index');
Route::get('/promosi-public/{id}', [PromosiPublicController::class, 'show'])->name('promosi.public.show');

Route::get('/dashboardadmin', function (){
    return view('admin.dashboardadmin');
});

// dashboard user controller
Route::get('/dashboarduser', [DashboardController::class, 'index'])->name('user.dashboarduser');

// Dashboard admin
Route::get('/admin', function () {
    return view('admin.dashboardadmin');
})->name('admin.dashboardadmin');

// Dashboard user
Route::get('/user', function () {
    return view('user.dashboarduser');
})->name('user.dashboarduser');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
// data peternak-admin
Route::get('/datapeternak', [ResidentController::class, 'index']);
Route::get('/datapeternak/create', [ResidentController::class, 'create']);
Route::get('/datapeternak/{id}', [ResidentController::class, 'edit']);
Route::post('/datapeternak', [ResidentController::class, 'store']);
Route::post('/datapeternak/{id}', [ResidentController::class, 'update']);
Route::delete('/datapeternak/{id}', [ResidentController::class, 'delete']);
});

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

// fitur-user
Route::prefix('user')->name('user.')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // pencatatan
    Route::resource('pencatatan', PencatatanController::class);
    // panen
    Route::resource('panen', DataPanenController::class);
    // promosi
    Route::resource('promosi', PromosiController::class);
    // daftar promosi
    Route::get('/daftar-promosi', [DaftarPromosiController::class, 'index'])->name('daftar-promosi.index');
    Route::post('/daftar-promosi/{id}/toggle-status', [DaftarPromosiController::class, 'toggleStatus'])->name('daftar-promosi.toggle-status');
    // laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export-pdf');
    // Riwayat Pencatatan
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/export', [RiwayatController::class, 'export'])->name('riwayat.export');
    // Nanti akan ditambahkan:
    // Route untuk Data Panen
    // Route untuk Promosi
    // Route untuk Laporan
    // Route untuk Riwayat Pencatatan
    // Route untuk Keluar
});

// login user & peternak
// autektikasi
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboardadmin', function() {
        return view('admin.dashboardadmin');
    })->name('dashboard');
});
// user
Route::prefix('user')->name('user.')->middleware(['auth', 'peternak'])->group(function () {
    Route::get('/dashboarduser', function() {
        return view('user.dashboarduser');
    })->name('dashboard');
});

Route::prefix('user')->name('user.')->middleware(['auth', 'peternak'])->group(function () {
    
    // Profile
    Route::get('/profile', [UserProfile::class, 'index'])->name('profile');
    Route::get('/profile/edit', [UserProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfile::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserProfile::class, 'updatePassword'])->name('profile.password');
});

// landing
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/search', [LandingController::class, 'search'])->name('search');
