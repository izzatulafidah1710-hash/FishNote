@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-tachometer-alt text-primary"></i> Dashboard Admin
        </h1>
        <div>
            <span class="text-muted">{{ now()->format('d F Y') }}</span>
        </div>
    </div>

    <!-- ==================== STATISTIK OVERVIEW ==================== -->
    <div class="row">
        <!-- Total Peternak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Peternak
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPeternak }}
                            </div>
                            <small class="text-muted">{{ $peternakBaru }} baru (30 hari)</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Pencatatan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pencatatan Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPencatatanBulanIni }}
                            </div>
                            <small class="text-muted">{{ $totalAktivitasHariIni }} hari ini</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Panen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Panen Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPanenBulanIni }}
                            </div>
                            <small class="text-muted">Data panen tercatat</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fish fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Promosi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Promosi Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPromosiAktif }}
                            </div>
                            <small class="text-muted">Promosi berjalan</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== KEUANGAN ==================== -->
    <div class="row">
        <!-- Card Keuangan Bulan Ini -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-area"></i> Grafik Keuangan (6 Bulan Terakhir)
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="chartKeuangan" height="80"></canvas>
                </div>
            </div>
        </div>

        <!-- Summary Keuangan -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-money-bill-wave"></i> Ringkasan Keuangan
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Bulan Ini -->
                    <h6 class="text-uppercase text-muted mb-3">Bulan Ini</h6>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> Pendapatan
                            </span>
                            <strong class="text-success">
                                Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}
                            </strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i> Pengeluaran
                            </span>
                            <strong class="text-danger">
                                Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}
                            </strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Laba/Rugi</span>
                            <strong class="{{ $labaBulanIni >= 0 ? 'text-success' : 'text-danger' }}">
                                Rp {{ number_format($labaBulanIni, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>

                    <hr>

                    <!-- Tahun Ini -->
                    <h6 class="text-uppercase text-muted mb-3">Tahun Ini</h6>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> Pendapatan
                            </span>
                            <strong class="text-success">
                                Rp {{ number_format($pendapatanTahunIni, 0, ',', '.') }}
                            </strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i> Pengeluaran
                            </span>
                            <strong class="text-danger">
                                Rp {{ number_format($pengeluaranTahunIni, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== DATA REAL-TIME ==================== -->
    <div class="row">
        <!-- Peternak Teraktif -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-trophy"></i> Peternak Teraktif (Bulan Ini)
                    </h6>
                </div>
                <div class="card-body">
                    @forelse($peternakTeraktif as $peternak)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                            <div>
                                <strong>{{ $loop->iteration }}. {{ $peternak->name }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ $peternak->aktivitas_count }} aktivitas
                                </small>
                            </div>
                            <span class="badge badge-primary badge-pill">
                                #{{ $loop->iteration }}
                            </span>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada data</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Promosi Terbaru -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bullhorn"></i> Promosi Terbaru
                    </h6>
                    <a href="{{ route('admin.datapromosi.index') }}" class="btn btn-sm btn-primary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    @forelse($promosiTerbaru as $promosi)
                        <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                            @if($promosi->foto)
                                <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                     class="rounded mr-3" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded mr-3 d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-image text-white"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <strong>{{ $promosi->judul_promosi }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ $promosi->resident->name ?? 'N/A' }} • 
                                    Rp {{ number_format($promosi->harga, 0, ',', '.') }}/{{ $promosi->satuan }}
                                </small>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada promosi</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Panen per Jenis Ikan -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-fish"></i> Panen per Jenis Ikan (Tahun Ini)
                    </h6>
                </div>
                <div class="card-body">
                    @forelse($panenPerJenis as $panen)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>{{ $panen->jenis_ikan }}</span>
                                <strong>{{ number_format($panen->total_berat, 0, ',', '.') }} kg</strong>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" 
                                     style="width: {{ ($panen->total_berat / $panenPerJenis->max('total_berat')) * 100 }}%">
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada data panen</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== AKTIVITAS TERBARU ==================== -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-stream"></i> Aktivitas Terbaru
                    </h6>
                    <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-sm btn-primary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Peternak</th>
                                    <th>Aktivitas</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($aktivitasTerbaru as $activity)
                                    <tr>
                                        <td>
                                            <small>
                                                {{ $activity->created_at->format('d/m H:i') }}
                                                <br>
                                                <span class="text-muted">
                                                    {{ $activity->created_at->diffForHumans() }}
                                                </span>
                                            </small>
                                        </td>
                                        <td>
                                            <strong>{{ $activity->peternak->name ?? 'N/A' }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $activity->badge_color }}">
                                                <i class="fas {{ $activity->icon }}"></i>
                                                {{ $activity->activity_type }}
                                            </span>
                                        </td>
                                        <td>{{ $activity->description }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Belum ada aktivitas
                                        </td>
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
// Grafik Keuangan
const ctx = document.getElementById('chartKeuangan').getContext('2d');
const chartKeuangan = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($chartKeuangan['months']) !!},
        datasets: [{
            label: 'Pendapatan',
            data: {!! json_encode($chartKeuangan['pendapatan']) !!},
            backgroundColor: 'rgba(78, 115, 223, 0.1)',
            borderColor: 'rgba(78, 115, 223, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        },
        {
            label: 'Pengeluaran',
            data: {!! json_encode($chartKeuangan['pengeluaran']) !!},
            backgroundColor: 'rgba(231, 74, 59, 0.1)',
            borderColor: 'rgba(231, 74, 59, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                        return label;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                    }
                }
            }
        }
    }
});
</script>
@endpush
@endsection