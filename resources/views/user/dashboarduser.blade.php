@extends('userlayouts.app')

@section('title', 'Dashboard Peternak')

@section('content')
<div class="container-fluid px-4 py-3">

    <!-- Vizora Top Header Bar -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Dashboard Peternak</h4>
            <p class="text-muted small mb-0">Selamat datang kembali, <strong class="text-dark">{{ Auth::user()->name }}</strong> 👋</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <div class="d-none d-sm-flex align-items-center mr-3">
                <span class="badge badge-pill badge-light border px-3 py-2 text-dark font-weight-bold mr-2">
                    <i class="fas fa-calendar-alt text-primary mr-1"></i> {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
                </span>
            </div>
            <a href="{{ route('user.riwayat.export') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-download mr-1.5"></i> Export Data
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
            <i class="fas fa-check-circle mr-2 text-success"></i>
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Metric Cards Grid (Vizora SaaS 4-Column Layout) -->
    <div class="row mb-4">
        <!-- Aktivitas Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('user.pencatatan.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Aktivitas Bulan Ini</span>
                            <div class="icon-square bg-primary-light">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalAktivitasBulanIni) }}</h3>
                            <span class="trend-badge-primary badge badge-primary px-2 py-1">Pencatatan</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Catatan aktivitas bulan ini</span>
                        <i class="fas fa-arrow-right text-primary"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Panen Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('user.panen.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Panen Bulan Ini</span>
                            <div class="icon-square bg-success-light">
                                <i class="fas fa-fish"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPanenBulanIni) }} <small class="text-muted" style="font-size: 13px;">Kali</small></h3>
                            <span class="trend-badge-success"><i class="fas fa-arrow-up mr-1"></i>Hasil Panen</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Tonase: <strong>{{ number_format($totalBeratPanenBulanIni ?? 0, 1) }} Kg</strong></span>
                        <i class="fas fa-arrow-right text-success"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Promosi Aktif -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('user.promosi.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Promosi Aktif</span>
                            <div class="icon-square bg-warning-light">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($promosiAktif) }}</h3>
                            <span class="trend-badge-warning">Pasar Online</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Tayang di marketplace</span>
                        <i class="fas fa-arrow-right text-warning"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estimasi Laba/Rugi -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('user.laporan.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">
                                {{ $labaRugiBulanIni >= 0 ? 'Estimasi Laba' : 'Estimasi Rugi' }}
                            </span>
                            <div class="icon-square {{ $labaRugiBulanIni >= 0 ? 'bg-info-light' : 'bg-danger-light' }}">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold {{ $labaRugiBulanIni >= 0 ? 'text-success' : 'text-danger' }} mb-0 mr-2" style="font-size: 1.35rem;">
                                Rp {{ number_format(abs($labaRugiBulanIni), 0, ',', '.') }}
                            </h3>
                            <span class="{{ $labaRugiBulanIni >= 0 ? 'trend-badge-info' : 'trend-badge-danger' }}">Keuangan</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Pemasukan vs Biaya</span>
                        <i class="fas fa-arrow-right text-info"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Charts Section (Vizora 8 / 4 Column Split) -->
    <div class="row mb-4">
        <!-- Main Line Chart Card -->
        <div class="col-xl-8 col-lg-7 mb-4 mb-xl-0">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <div>
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Arus Keuangan</span>
                        <h5 class="font-weight-bold text-dark mb-0">Rp {{ number_format($totalPendapatanBulanIni ?? 0, 0, ',', '.') }}</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-light border mr-2 px-3 py-1.5 font-weight-bold text-dark">6 Bulan Terakhir</span>
                        <a href="{{ route('user.laporan.index') }}" class="btn btn-outline-primary btn-sm font-weight-bold rounded-lg px-3">
                            Laporan Lengkap
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div style="position: relative; height: 300px;">
                        <canvas id="chartKeuangan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breakdown Card (Panen Menurut Jenis Ikan) -->
        <div class="col-xl-4 col-lg-5">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="font-weight-bold text-dark mb-0">Distribusi Panen</h6>
                    <span class="badge badge-info px-2.5 py-1">Jenis Ikan</span>
                </div>
                <div class="card-body p-4">
                    @if($panenPerJenis->count() > 0)
                        <div style="position: relative; height: 200px;" class="mb-3">
                            <canvas id="chartPanenJenis"></canvas>
                        </div>
                        <div class="mt-2">
                            @foreach($panenPerJenis as $jenis)
                                <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded-lg">
                                    <span class="font-weight-bold text-dark small">{{ $jenis->jenis_ikan }}</span>
                                    <span class="badge badge-primary px-3 py-1">{{ number_format($jenis->total_berat, 1) }} Kg</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-box-open fa-3x text-gray-300 mb-2"></i>
                            <p class="mb-0 small">Belum ada data panen terdaftar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section (Vizora 4 / 8 Column Split) -->
    <div class="row">
        <!-- Callout Action Card (Col-4) -->
        <div class="col-xl-4 col-lg-5 mb-4 mb-xl-0">
            <div class="card border-0 shadow-sm rounded-lg bg-white h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge badge-primary px-3 py-1 font-weight-bold">Aksi Cepat</span>
                            <i class="fas fa-seedling text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="font-weight-bold text-dark mb-2">Kelola Budidaya Ikan</h4>
                        <p class="text-muted small mb-4" style="line-height: 1.6;">
                            Dokumentasikan setiap pemberian pakan, pengeluaran operasional, dan hasil panen kolam secara real-time.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('user.pencatatan.create') }}" class="btn btn-primary btn-block font-weight-bold mb-2 py-2 shadow-sm">
                            <i class="fas fa-clipboard-list mr-1.5"></i> Catat Aktivitas Baru
                        </a>
                        <a href="{{ route('user.panen.create') }}" class="btn btn-outline-primary btn-block font-weight-bold py-2">
                            <i class="fas fa-box mr-1.5"></i> Input Data Panen
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table (Col-8) -->
        <div class="col-xl-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Aktivitas & Panen Terkini</h6>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('user.riwayat.index') }}" class="btn btn-light border btn-sm font-weight-bold px-3">
                            Lihat Semua Log
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive border-0">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th>Aktivitas</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pencatatanTerbaru as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="icon-square bg-primary-light mr-3">
                                                <i class="fas fa-clipboard-check"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-dark">{{ $item->jenis_kegiatan }}</div>
                                                <small class="text-muted">{{ $item->jenis_ikan ?? 'Kolam General' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="small text-muted">{{ $item->tanggal->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge badge-primary px-2.5 py-1">Pencatatan</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('user.pencatatan.show', $item->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada pencatatan aktivitas</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart Keuangan
    const ctxKeuangan = document.getElementById('chartKeuangan');
    if (ctxKeuangan) {
        new Chart(ctxKeuangan.getContext('2d'), {
            type: 'line',
            data: {
                labels: @json($chartData['months']),
                datasets: [
                    {
                        label: 'Pemasukan (Panen)',
                        data: @json($chartData['pendapatan']),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.05)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Pengeluaran (Biaya)',
                        data: @json($chartData['pengeluaran']),
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.05)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + ' Jt';
                            }
                        }
                    }
                }
            }
        });
    }

    // Doughnut Chart Panen per Jenis
    const ctxPanenJenis = document.getElementById('chartPanenJenis');
    if (ctxPanenJenis) {
        const panenData = @json($panenPerJenis);
        if (panenData.length > 0) {
            new Chart(ctxPanenJenis.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: panenData.map(item => item.jenis_ikan),
                    datasets: [{
                        data: panenData.map(item => item.total_berat),
                        backgroundColor: ['#2563eb', '#10b981', '#f59e0b', '#06b6d4', '#8b5cf6', '#ec4899']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        }
    }
});
</script>
@endpush
@endsection