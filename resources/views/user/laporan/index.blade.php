@extends('userlayouts.app')

@section('title', 'Laporan Keuangan & Budidaya')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Laporan Keuangan & Budidaya</h4>
            <p class="text-muted small mb-0">Rekapitulasi pemasukan, pengeluaran, dan statistik laba/rugi usaha budidaya Anda.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0 gap-2">
            <a href="{{ route('user.laporan.print', ['bulan' => $bulan, 'tahun' => $tahun]) }}" target="_blank"
               class="btn btn-light border font-weight-bold px-3 py-2 rounded-lg mr-2" style="font-size: 0.85rem;">
                <i class="fas fa-print mr-1"></i> Print
            </a>
            <a href="{{ route('user.laporan.export-pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
               class="btn btn-primary font-weight-bold px-3 py-2 rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-file-pdf mr-1"></i> Export PDF
            </a>
        </div>
    </div>

    {{-- Filter Periode --}}
    <div class="card border-0 shadow-sm rounded-lg mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Filter Periode Laporan</h6>
            <span class="badge badge-primary px-3 py-1">
                {{ \Carbon\Carbon::createFromDate($tahun, $bulan, 1)->isoFormat('MMMM Y') }}
            </span>
        </div>
        <div class="card-body py-3 px-4">
            <form method="GET" action="{{ route('user.laporan.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Bulan</label>
                        <select name="bulan" class="form-control form-control-sm" required>
                            @php
                                $monthNames = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                            @endphp
                            @foreach($monthNames as $m => $name)
                            <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Tahun</label>
                        <select name="tahun" class="form-control form-control-sm" required>
                            @for($y = date('Y'); $y >= date('Y') - 5; $y--)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-4">
                            <i class="fas fa-search mr-1"></i> Tampilkan Laporan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Summary Stat Cards (Vizora style) --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Pemasukan</span>
                        <div class="icon-square bg-success-light"><i class="fas fa-arrow-up"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.35rem;">Rp {{ number_format($laporanKeuangan['total_pemasukan'], 0, ',', '.') }}</h3>
                        <span class="trend-badge-success">Panen</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Hasil penjualan panen</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Pengeluaran</span>
                        <div class="icon-square bg-danger-light"><i class="fas fa-arrow-down"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.35rem;">Rp {{ number_format($laporanKeuangan['total_pengeluaran'], 0, ',', '.') }}</h3>
                        <span class="trend-badge-danger">Biaya</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Biaya operasional & pakan</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">
                            {{ $laporanKeuangan['laba_rugi'] >= 0 ? 'Estimasi Laba' : 'Estimasi Rugi' }}
                        </span>
                        <div class="icon-square {{ $laporanKeuangan['laba_rugi'] >= 0 ? 'bg-info-light' : 'bg-danger-light' }}">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold {{ $laporanKeuangan['laba_rugi'] >= 0 ? 'text-success' : 'text-danger' }} mb-0 mr-2" style="font-size: 1.35rem;">
                            Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}
                        </h3>
                        <span class="{{ $laporanKeuangan['laba_rugi'] >= 0 ? 'trend-badge-success' : 'trend-badge-danger' }}">Keuangan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Selisih pemasukan - pengeluaran</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Keuangan --}}
    <div class="card border-0 shadow-sm rounded-lg mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <div>
                <span class="text-xs font-weight-bold text-muted text-uppercase">Tren Keuangan</span>
                <h6 class="font-weight-bold text-dark mb-0">Grafik Pemasukan & Pengeluaran (Tahun {{ $tahun }})</h6>
            </div>
        </div>
        <div class="card-body p-4">
            <div style="position: relative; height: 280px;">
                <canvas id="chartKeuangan"></canvas>
            </div>
        </div>
    </div>

    {{-- Detail Report Grid --}}
    <div class="row">
        {{-- Laporan Pencatatan --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Laporan Pencatatan Aktivitas</h6>
                    <div class="icon-square bg-info-light"><i class="fas fa-clipboard-list"></i></div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                            <span class="text-muted small">Total Transaksi Activity</span>
                            <strong class="text-dark">{{ $laporanPencatatan['total_pencatatan'] }} Kali</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                            <span class="text-muted small">Total Biaya Operasional</span>
                            <strong class="text-danger">Rp {{ number_format($laporanPencatatan['total_biaya'], 0, ',', '.') }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                            <span class="text-muted small">Total Konsumsi Pakan</span>
                            <strong class="text-dark">{{ number_format($laporanPencatatan['total_pakan'], 2) }} Kg</strong>
                        </div>
                    </div>
                    <h6 class="font-weight-bold text-dark mb-3 mt-4">Distribusi Kegiatan:</h6>
                    @forelse($laporanPencatatan['by_jenis_kegiatan'] as $kegiatan)
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded-lg">
                        <span class="badge badge-info">{{ $kegiatan->jenis_kegiatan }}</span>
                        <strong class="text-dark small">{{ $kegiatan->total }} Kali</strong>
                    </div>
                    @empty
                    <p class="text-muted text-center py-3 small">Tidak ada data pencatatan</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Laporan Panen --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Laporan Hasil Panen</h6>
                    <div class="icon-square bg-success-light"><i class="fas fa-fish"></i></div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                            <span class="text-muted small">Frekuensi Panen</span>
                            <strong class="text-dark">{{ $laporanPanen['total_panen'] }} Kali</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                            <span class="text-muted small">Total Berat Ikan</span>
                            <strong class="text-dark">{{ number_format($laporanPanen['total_berat'], 2) }} Kg</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                            <span class="text-muted small">Total Hasil Penjualan</span>
                            <strong class="text-success">Rp {{ number_format($laporanPanen['total_pendapatan'], 0, ',', '.') }}</strong>
                        </div>
                    </div>
                    <h6 class="font-weight-bold text-dark mb-3 mt-4">Per Jenis Ikan:</h6>
                    @forelse($laporanPanen['by_jenis_ikan'] as $ikan)
                    <div class="mb-2 p-2 bg-light rounded-lg">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge badge-success">{{ $ikan->jenis_ikan }}</span>
                            <strong class="text-dark small">{{ number_format($ikan->total_berat, 2) }} Kg</strong>
                        </div>
                        <small class="text-muted d-block mt-1">Rp {{ number_format($ikan->total_pendapatan, 0, ',', '.') }}</small>
                    </div>
                    @empty
                    <p class="text-muted text-center py-3 small">Tidak ada data panen</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Laporan Promosi --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Laporan Promosi Pasar</h6>
                    <div class="icon-square bg-warning-light"><i class="fas fa-bullhorn"></i></div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                        <span class="text-muted small">Total Promosi Dibuat</span>
                        <strong class="text-dark">{{ $laporanPromosi['total_promosi'] }}</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                        <span class="text-muted small">Promosi Aktif Saat Ini</span>
                        <strong class="text-success">{{ $laporanPromosi['promosi_aktif'] }}</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                        <span class="text-muted small">Total Views Pembeli</span>
                        <strong class="text-dark">{{ number_format($laporanPromosi['total_views']) }} Kali</strong>
                    </div>
                    @if($laporanPromosi['total_promosi'] == 0)
                    <div class="text-center py-4 text-muted small mt-3">
                        Belum ada promosi pada periode ini.
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Ringkasan Performa --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Ringkasan Performa Budidaya</h6>
                    <div class="icon-square bg-primary-light"><i class="fas fa-chart-line"></i></div>
                </div>
                <div class="card-body p-4">
                    @if($laporanKeuangan['laba_rugi'] >= 0)
                    <div class="stat-card-vizora" style="background-color: #ecfdf5; border-color: #6ee7b7 !important;">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-square bg-success-light mr-3"><i class="fas fa-thumbs-up"></i></div>
                            <span class="font-weight-bold text-dark">Performa Positif 🎉</span>
                        </div>
                        <p class="text-muted small mb-0">
                            Anda memperoleh estimasi laba sebesar
                            <strong class="text-success">Rp {{ number_format($laporanKeuangan['laba_rugi'], 0, ',', '.') }}</strong>
                            pada periode ini.
                        </p>
                    </div>
                    @else
                    <div class="stat-card-vizora" style="background-color: #fffbeb; border-color: #fcd34d !important;">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-square bg-warning-light mr-3"><i class="fas fa-exclamation-triangle"></i></div>
                            <span class="font-weight-bold text-dark">Perhatian</span>
                        </div>
                        <p class="text-muted small mb-0">
                            Terjadi selisih pengeluaran lebih tinggi sebesar
                            <strong class="text-danger">Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}</strong>.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('chartKeuangan');
    if (ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: @json($chartData['months']),
                datasets: [
                    {
                        label: 'Pemasukan (Panen)',
                        data: @json($chartData['pendapatan']),
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.08)',
                        borderWidth: 2.5,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#10b981'
                    },
                    {
                        label: 'Pengeluaran (Biaya)',
                        data: @json($chartData['pengeluaran']),
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.06)',
                        borderWidth: 2.5,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#ef4444'
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
                        },
                        grid: { color: 'rgba(0,0,0,0.04)' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }
});
</script>
@endpush
@endsection