<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PromosiPublicController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PeternakActivityController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PencatatanController;
use App\Http\Controllers\User\DataPanenController;
use App\Http\Controllers\User\PromosiController as UserPromosiController;
use App\Http\Controllers\User\DaftarPromosiController;
use App\Http\Controllers\User\LaporanController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\User\ProfileController as UserProfile;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Promosi Public
Route::get('/promosi', [PromosiPublicController::class, 'index'])->name('promosi');
Route::get('/promosi/{id}', [PromosiPublicController::class, 'show'])->name('promosi.show');
Route::get('/search', [PromosiPublicController::class, 'search'])->name('search');

// Serving public storage files safely
Route::get('/file/{fotoPath}', function ($fotoPath) {
    $path = urldecode($fotoPath);

    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }
    return response()->file(Storage::disk('public')->path($path));
})->where('fotoPath', '.*')->name('file.show');

/*
|--------------------------------------------------------------------------
| Guest Routes (Authentikasi)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected: auth, admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboardadmin', [AdminDashboardController::class, 'index']); // Alias

    // Data Peternak
    Route::get('/datapeternak', [ResidentController::class, 'index'])->name('datapeternak.index');
    Route::get('/datapeternak/create', [ResidentController::class, 'create'])->name('datapeternak.create');
    Route::post('/datapeternak', [ResidentController::class, 'store'])->name('datapeternak.store');
    Route::get('/datapeternak/{id}', [ResidentController::class, 'show'])->name('datapeternak.show');
    Route::get('/datapeternak/{id}/edit', [ResidentController::class, 'edit'])->name('datapeternak.edit');
    Route::put('/datapeternak/{id}', [ResidentController::class, 'update'])->name('datapeternak.update');
    Route::delete('/datapeternak/{id}', [ResidentController::class, 'destroy'])->name('datapeternak.delete');

    // Data Promosi
    Route::resource('datapromosi', PromotionController::class);
    Route::post('/datapromosi/{id}/toggle-status', [PromotionController::class, 'toggleStatus'])->name('datapromosi.toggle-status');

    // Aktivitas Peternak
    Route::get('/aktivitas', [PeternakActivityController::class, 'index'])->name('aktivitas.index');
    Route::delete('/aktivitas/{id}', [PeternakActivityController::class, 'destroy'])->name('aktivitas.delete');
    Route::post('/aktivitas/clear', [PeternakActivityController::class, 'clearOldActivities'])->name('aktivitas.clear');
});

/*
|--------------------------------------------------------------------------
| User / Peternak Routes (Protected: auth, peternak)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->middleware(['auth', 'peternak'])->group(function () {
    // Dashboard User
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboarduser', [UserDashboardController::class, 'index']); // Alias

    // Pencatatan
    Route::resource('pencatatan', PencatatanController::class);

    // Panen
    Route::resource('panen', DataPanenController::class);

    // Promosi
    Route::resource('promosi', UserPromosiController::class);

    // Daftar Promosi & Toggle Status
    Route::get('/daftar-promosi', [DaftarPromosiController::class, 'index'])->name('daftar-promosi.index');
    Route::post('/daftar-promosi/{id}/toggle-status', [DaftarPromosiController::class, 'toggleStatus'])->name('daftar-promosi.toggle-status');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export-pdf');

    // Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/export', [RiwayatController::class, 'export'])->name('riwayat.export');

    // Profile
    Route::get('/profile', [UserProfile::class, 'index'])->name('profile');
    Route::get('/profile/edit', [UserProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfile::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserProfile::class, 'updatePassword'])->name('profile.password');
});
 