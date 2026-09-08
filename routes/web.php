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

use App\Http\Controllers\InfoAkunController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Artikel / Blog
Route::get('/artikel', function () {
    return view('artikel.index');
})->name('artikel.index');

Route::get('/artikel/{slug}', function ($slug) {
    // Data dummy untuk artikel
    $articles = [
        'cara-efektif-menjaga-kualitas-air' => [
            'title' => 'Cara Efektif Menjaga Kualitas Air Kolam Nila Agar Ikan Cepat Besar',
            'image' => asset('template/img/nila.jpg'),
            'category' => 'Panduan Budidaya',
            'date' => '12 Sep 2026',
            'read_time' => '5 Min Baca',
            'author' => 'Faisal Ahmad',
            'content' => '<p class="text-xl font-medium text-slate-700">Kualitas air adalah kunci sukses budidaya ikan nila. Pelajari cara mengukur pH, mengatur sirkulasi, dan menjaga kadar oksigen tetap optimal di segala cuaca.</p><p>Banyak peternak pemula sering kali mengabaikan pentingnya pengukuran pH air secara berkala. Padahal faktor ini berkontribusi langsung pada tingkat <strong>Feed Conversion Ratio (FCR)</strong> dan kelangsungan hidup ikan.</p>'
        ],
        'strategi-pemberian-pakan-lele' => [
            'title' => 'Strategi Pemberian Pakan Lele untuk Menekan FCR dan Menghemat Biaya',
            'image' => asset('template/img/catfish_feeding.png'),
            'category' => 'Manajemen Pakan',
            'date' => '05 Sep 2026',
            'read_time' => '4 Min Baca',
            'author' => 'Dina Rahma',
            'content' => '<p class="text-xl font-medium text-slate-700">Menekan biaya pakan (FCR) sangat penting dalam budidaya lele. Simak takaran pakan ideal dan alternatif pakan tambahan untuk memaksimalkan keuntungan Anda.</p><p>Pemberian pakan yang tidak teratur dan berlebihan (overfeeding) justru akan menurunkan kualitas air dan membuat biaya membengkak. Gunakan metode pemberian pakan yang terkontrol.</p>'
        ],
        'menjual-hasil-panen-langsung' => [
            'title' => 'Cara Menjual Hasil Panen Langsung ke Pembeli dengan FishNote',
            'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'category' => 'Bisnis & Pasar',
            'date' => '28 Agu 2026',
            'read_time' => '6 Min Baca',
            'author' => 'Budi Wibowo',
            'content' => '<p class="text-xl font-medium text-slate-700">Bosan dengan tengkulak? Inilah saatnya Anda mengontrol harga jual hasil panen. Pelajari cara membuat promosi menarik di FishNote yang langsung dilirik restoran dan pasar.</p><p>Di FishNote, Anda dapat memasang foto panen terbaru, mencantumkan harga yang transparan, dan terhubung langsung dengan pembeli tanpa perantara.</p>'
        ],
        'pemilihan-bibit-unggul' => [
            'title' => 'Tips Memilih Bibit Unggul untuk Panen Maksimal',
            'image' => asset('template/img/lele.jpg'),
            'category' => 'Pemilihan Bibit',
            'date' => '20 Agu 2026',
            'read_time' => '4 Min Baca',
            'author' => 'Ahmad Subagyo',
            'content' => '<p class="text-xl font-medium text-slate-700">Memulai dengan bibit yang tepat adalah setengah dari keberhasilan. Pahami ciri-ciri fisik bibit unggul dan tahan penyakit sebelum menebarnya di kolam Anda.</p><p>Pilihlah bibit yang aktif, tidak cacat, dan ukurannya seragam agar pertumbuhannya optimal dan meminimalisir persaingan pakan.</p>'
        ],
        'mencegah-penyakit-ikan' => [
            'title' => 'Mencegah Wabah Penyakit di Musim Penghujan',
            'image' => asset('template/img/patin.jpg'),
            'category' => 'Manajemen Penyakit',
            'date' => '15 Agu 2026',
            'read_time' => '5 Min Baca',
            'author' => 'Dina Rahma',
            'content' => '<p class="text-xl font-medium text-slate-700">Perubahan cuaca drastis sangat rawan bagi ikan. Simak langkah-langkah preventif pemberian vitamin dan penyesuaian pakan saat musim hujan tiba.</p><p>Selain menambahkan vitamin ke dalam pakan, pastikan juga kestabilan suhu dan kualitas air kolam dengan melakukan pergantian air secara rutin.</p>'
        ],
        'sistem-bioflok-modern' => [
            'title' => 'Mengenal Sistem Bioflok: Hemat Pakan, Lahan Minim',
            'image' => asset('template/img/gurame.jpg'),
            'category' => 'Teknologi Budidaya',
            'date' => '02 Agu 2026',
            'read_time' => '7 Min Baca',
            'author' => 'Hendra Nurjaman',
            'content' => '<p class="text-xl font-medium text-slate-700">Punya lahan terbatas tapi ingin panen melimpah? Sistem bioflok bisa jadi solusinya. Ketahui cara kerja dan persiapan awal membuat kolam bioflok Anda sendiri.</p><p>Sistem ini memanfaatkan bakteri baik untuk mengurai sisa pakan menjadi sumber makanan baru, sehingga dapat menghemat biaya pakan secara signifikan.</p>'
        ]
    ];

    $article = $articles[$slug] ?? null;
    if (!$article) {
        abort(404);
    }

    return view('artikel.show', compact('article'));
})->name('artikel.show');

// Promosi Public
Route::get('/promosi', [PromosiPublicController::class, 'index'])->name('promosi');
Route::get('/promosi/{id}', [PromosiPublicController::class, 'show'])->name('promosi.show');
Route::get('/search', [PromosiPublicController::class, 'search'])->name('search');

// Serving public storage files safely
Route::get('/file/{fotoPath}', function ($fotoPath) {
    $path = urldecode($fotoPath);
    // Sanitize path to prevent directory traversal
    $path = str_replace(['..', '\\'], ['', '/'], $path);
    $path = ltrim($path, '/');

    if (empty($path) || !Storage::disk('public')->exists($path)) {
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
    Route::resource('promotions', PromotionController::class);
    Route::post('/datapromosi/{id}/toggle-status', [PromotionController::class, 'toggleStatus'])->name('datapromosi.toggle-status');

    // Aktivitas Peternak
    Route::get('/aktivitas', [PeternakActivityController::class, 'index'])->name('aktivitas.index');
    Route::delete('/aktivitas/{id}', [PeternakActivityController::class, 'destroy'])->name('aktivitas.delete');
    Route::post('/aktivitas/clear', [PeternakActivityController::class, 'clearOldActivities'])->name('aktivitas.clear');

    // Info Akun Peternak
    Route::resource('infoakun', InfoAkunController::class)->names([
        'index' => 'infoakun.index',
        'create' => 'infoakun.create',
        'store' => 'infoakun.store',
        'show' => 'infoakun.show',
        'edit' => 'infoakun.edit',
        'update' => 'infoakun.update',
        'destroy' => 'infoakun.destroy',
    ]);
});

// Non-prefixed alias untuk infoakun (jika view tanpa admin. prefix)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('infoakun', InfoAkunController::class);
});

/*
|--------------------------------------------------------------------------
| User / Peternak Routes (Protected: auth, peternak)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->middleware(['auth', 'peternak'])->group(function () {
    // Dashboard User
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboarduser', [UserDashboardController::class, 'index'])->name('dashboarduser'); // Alias

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
 