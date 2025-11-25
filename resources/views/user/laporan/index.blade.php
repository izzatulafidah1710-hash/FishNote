@extends('userlayouts.app')

@section('title', 'Laporan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chart-line text-primary"></i> Laporan Keuangan & Aktivitas
        </h1>
        <div>
            <a href="{{ route('user.laporan.print', ['bulan' => $bulan, 'tahun' => $tahun]) }}" target="_blank" class="btn btn-info btn-sm">
                <i class="fas fa-print"></i> Print Laporan
            </a>
            <a href="{{ route('user.laporan.export-pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
        </div>
    </div>

    <!-- Filter Periode -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter"></i> Filter Periode Laporan
            </h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('user.laporan.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control" required>
                                @php
                                    $monthNames = [
                                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                    ];
                                @endphp
                                @foreach($monthNames as $m => $name)
                                <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control" required>
                                @for($y = date('Y'); $y >= date('Y') - 5; $y--)
                                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Tampilkan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Periode -->
    <div class="alert alert-info">
        <i class="fas fa-calendar-alt"></i> 
        Menampilkan laporan untuk periode: <strong>{{ \Carbon\Carbon::createFromDate($tahun, $bulan, 1)->format('F Y') }}</strong>
    </div>

    <!-- Laporan Keuangan -->
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pemasukan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($laporanKeuangan['total_pemasukan'], 0, ',', '.') }}
                            </div>
                            <small class="text-muted">Dari panen</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pengeluaran
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($laporanKeuangan['total_pengeluaran'], 0, ',', '.') }}
                            </div>
                            <small class="text-muted">Dari biaya operasional</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-{{ $laporanKeuangan['laba_rugi'] >= 0 ? 'primary' : 'warning' }} shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-{{ $laporanKeuangan['laba_rugi'] >= 0 ? 'primary' : 'warning' }} text-uppercase mb-1">
                                {{ $laporanKeuangan['laba_rugi'] >= 0 ? 'Laba' : 'Rugi' }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}
                            </div>
                            <small class="text-muted">Selisih pemasukan & pengeluaran</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Keuangan -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-area"></i> Grafik Pemasukan & Pengeluaran Tahun {{ $tahun }}
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="chartKeuangan" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan Detail -->
    <div class="row">
        <!-- Laporan Pencatatan -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-info text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-clipboard"></i> Laporan Pencatatan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pencatatan:</span>
                            <strong>{{ $laporanPencatatan['total_pencatatan'] }} kali</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Biaya:</span>
                            <strong class="text-danger">Rp {{ number_format($laporanPencatatan['total_biaya'], 0, ',', '.') }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pakan:</span>
                            <strong>{{ number_format($laporanPencatatan['total_pakan'], 2) }} Kg</strong>
                        </div>
                    </div>

                    <hr>

                    <h6 class="font-weight-bold mb-3">Berdasarkan Jenis Kegiatan:</h6>
                    @forelse($laporanPencatatan['by_jenis_kegiatan'] as $kegiatan)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge badge-info">{{ $kegiatan->jenis_kegiatan }}</span>
                        <strong>{{ $kegiatan->total }} kali</strong>
                    </div>
                    @empty
                    <p class="text-muted text-center">Tidak ada data pencatatan</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Laporan Panen -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-success text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-box"></i> Laporan Panen
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Panen:</span>
                            <strong>{{ $laporanPanen['total_panen'] }} kali</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Berat:</span>
                            <strong>{{ number_format($laporanPanen['total_berat'], 2) }} Kg</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pendapatan:</span>
                            <strong class="text-success">Rp {{ number_format($laporanPanen['total_pendapatan'], 0, ',', '.') }}</strong>
                        </div>
                    </div>

                    <hr>

                    <h6 class="font-weight-bold mb-3">Berdasarkan Jenis Ikan:</h6>
                    @forelse($laporanPanen['by_jenis_ikan'] as $ikan)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge badge-success">{{ $ikan->jenis_ikan }}</span>
                            <strong>{{ number_format($ikan->total_berat, 2) }} Kg</strong>
                        </div>
                        <small class="text-muted">Pendapatan: Rp {{ number_format($ikan->total_pendapatan, 0, ',', '.') }}</small>
                    </div>
                    @empty
                    <p class="text-muted text-center">Tidak ada data panen</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Laporan Promosi -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-warning text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-bullhorn"></i> Laporan Promosi
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Promosi Dibuat:</span>
                        <strong>{{ $laporanPromosi['total_promosi'] }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Promosi Aktif:</span>
                        <strong class="text-success">{{ $laporanPromosi['promosi_aktif'] }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Dilihat:</span>
                        <strong>{{ number_format($laporanPromosi['total_views']) }} kali</strong>
                    </div>

                    @if($laporanPromosi['total_promosi'] == 0)
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i> Belum ada promosi yang dibuat periode ini.
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-chart-pie"></i> Ringkasan Periode Ini
                    </h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold text-success mb-3">✓ Pencapaian:</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success"></i> {{ $laporanPencatatan['total_pencatatan'] }} aktivitas tercatat</li>
                        <li class="mb-2"><i class="fas fa-check text-success"></i> {{ $laporanPanen['total_panen'] }} kali panen</li>
                        <li class="mb-2"><i class="fas fa-check text-success"></i> {{ number_format($laporanPanen['total_berat'], 2) }} Kg ikan dipanen</li>
                        <li class="mb-2"><i class="fas fa-check text-success"></i> {{ $laporanPromosi['total_promosi'] }} promosi dibuat</li>
                    </ul>

                    <hr>

                    <h6 class="font-weight-bold text-primary mb-3">📊 Performa Keuangan:</h6>
                    @if($laporanKeuangan['laba_rugi'] >= 0)
                    <div class="alert alert-success">
                        <strong>Selamat!</strong> Anda mendapat laba sebesar <strong>Rp {{ number_format($laporanKeuangan['laba_rugi'], 0, ',', '.') }}</strong> periode ini.
                    </div>
                    @else
                    <div class="alert alert-warning">
                        <strong>Perhatian!</strong> Anda mengalami rugi sebesar <strong>Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}</strong> periode ini.
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
// Chart Keuangan
const ctx = document.getElementById('chartKeuangan').getContext('2d');
const chartKeuangan = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartData['months']),
        datasets: [
            {
                label: 'Pemasukan',
                data: @json($chartData['pendapatan']),
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4
            },
            {
                label: 'Pengeluaran',
                data: @json($chartData['pengeluaran']),
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                }
            }
        }
    }
});
</script>
@endpush
@endsection