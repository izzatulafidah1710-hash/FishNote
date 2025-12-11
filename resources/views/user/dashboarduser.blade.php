@extends('userlayouts.app')

@section('title', 'Dashboard Peternak')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hallo Selamat Datang Peternak</h1>
        <div>
            <a href="{{ route('user.pencatatan.create') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pencatatan
            </a>
        </div>
    </div>

    <!-- Summary Cards Row -->
    <div class="row">
        <!-- Aktivitas Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Aktivitas Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAktivitasBulanIni }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panen Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Panen Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPanenBulanIni }} kali</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promosi Aktif -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Promosi Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $promosiAktif }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laba/Rugi Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-{{ $labaRugiBulanIni >= 0 ? 'info' : 'danger' }} shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-{{ $labaRugiBulanIni >= 0 ? 'info' : 'danger' }} text-uppercase mb-1">
                                {{ $labaRugiBulanIni >= 0 ? 'Laba' : 'Rugi' }} Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format(abs($labaRugiBulanIni), 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Row -->
    <div class="row">
        <!-- Chart Keuangan -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Keuangan (6 Bulan Terakhir)</h6>
                    <a href="{{ route('user.laporan.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chart-bar"></i> Lihat Laporan Lengkap
                    </a>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="position: relative; height: 320px;">
                        <canvas id="chartKeuangan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart Panen per Jenis -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Panen per Jenis Ikan (Tahun Ini)</h6>
                </div>
                <div class="card-body">
                    @if($panenPerJenis->count() > 0)
                        <div class="chart-pie" style="position: relative; height: 250px; width: 100%;">
                            <canvas id="chartPanenJenis"></canvas>
                        </div>
                        <div class="mt-3 text-center small">
                            @foreach($panenPerJenis as $jenis)
                            <span class="mr-2 mb-1 d-inline-block">
                                <i class="fas fa-circle" style="color: {{ ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'][$loop->index % 5] }}"></i>
                                {{ $jenis->jenis_ikan }}
                            </span>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted d-flex align-items-center justify-content-center" style="height: 300px;">
                            <div>
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                <p class="mb-0">Belum ada data panen</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Aktivitas Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                    <a href="{{ route('user.pencatatan.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @forelse($pencatatanTerbaru as $item)
                    <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-clipboard text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="small text-gray-500">{{ $item->tanggal->format('d/m/Y') }}</div>
                            <div class="font-weight-bold">{{ $item->jenis_kegiatan }}</div>
                            <div class="small text-muted">{{ $item->jenis_ikan }} - {{ $item->kolam }}</div>
                        </div>
                        <div>
                            <a href="{{ route('user.pencatatan.show', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted py-4">Belum ada pencatatan</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Panen Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">Panen Terbaru</h6>
                    <a href="{{ route('user.panen.index') }}" class="btn btn-sm btn-success">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @forelse($panenTerbaru as $item)
                    <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-box text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="small text-gray-500">{{ $item->tanggal_panen->format('d/m/Y') }}</div>
                            <div class="font-weight-bold">{{ $item->jenis_ikan }} - {{ number_format($item->berat_total, 2) }} Kg</div>
                            <div class="small text-success font-weight-bold">Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <a href="{{ route('user.panen.show', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted py-4">Belum ada data panen</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Promosi Performance & Quick Stats -->
    <div class="row">
        <!-- Promosi Performance -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-warning">Top Promosi</h6>
                    <a href="{{ route('user.daftar-promosi.index') }}" class="btn btn-sm btn-warning">Kelola Promosi</a>
                </div>
                <div class="card-body">
                    @forelse($promosiPerformance as $item)
                    <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-bullhorn text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="font-weight-bold">{{ Str::limit($item->judul_promosi, 30) }}</div>
                            <div class="small text-muted">
                                <i class="fas fa-eye"></i> {{ number_format($item->views) }} views | 
                                <span class="badge badge-{{ $item->status_badge }}">{{ $item->status }}</span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('user.promosi.show', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted py-4">Belum ada promosi aktif</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Statistik Tahun Ini</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-700"><i class="fas fa-fish text-primary"></i> Total Pakan Digunakan</span>
                            <strong>{{ number_format($totalPakan, 2) }} Kg</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-primary" style="width: {{ min(($totalPakan / 1000) * 100, 100) }}%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-700"><i class="fas fa-weight text-success"></i> Total Berat Panen</span>
                            <strong>{{ number_format($totalBeratPanen, 2) }} Kg</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" style="width: {{ min(($totalBeratPanen / 1000) * 100, 100) }}%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-700"><i class="fas fa-eye text-warning"></i> Total Views Promosi</span>
                            <strong>{{ number_format($totalViews) }}</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: {{ min(($totalViews / 1000) * 100, 100) }}%"></div>
                        </div>
                    </div>

                    <hr>

                    <div class="row text-center">
                        <div class="col-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan</div>
                            <div class="h6 mb-0 font-weight-bold text-success">
                                Rp {{ number_format($pendapatanBulanIni / 1000000, 1) }}Jt
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengeluaran</div>
                            <div class="h6 mb-0 font-weight-bold text-danger">
                                Rp {{ number_format($pengeluaranBulanIni / 1000000, 1) }}Jt
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $labaRugiBulanIni >= 0 ? 'Laba' : 'Rugi' }}
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-{{ $labaRugiBulanIni >= 0 ? 'info' : 'warning' }}">
                                Rp {{ number_format(abs($labaRugiBulanIni) / 1000000, 1) }}Jt
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.icon-circle {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chart-area {
    position: relative;
}

.chart-pie {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

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
                        label: 'Pemasukan',
                        data: @json($chartData['pendapatan']),
                        borderColor: '#1cc88a',
                        backgroundColor: 'rgba(28, 200, 138, 0.05)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 3,
                        pointBackgroundColor: '#1cc88a',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: '#1cc88a',
                        pointHoverBorderColor: '#fff',
                        pointHitRadius: 10,
                        pointBorderWidth: 2
                    },
                    {
                        label: 'Pengeluaran',
                        data: @json($chartData['pengeluaran']),
                        borderColor: '#e74a3b',
                        backgroundColor: 'rgba(231, 74, 59, 0.05)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 3,
                        pointBackgroundColor: '#e74a3b',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: '#e74a3b',
                        pointHoverBorderColor: '#fff',
                        pointHitRadius: 10,
                        pointBorderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 15,
                            font: {
                                size: 12,
                                family: "'Nunito', sans-serif"
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        padding: 12,
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11,
                                family: "'Nunito', sans-serif"
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 11,
                                family: "'Nunito', sans-serif"
                            },
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'Jt';
                            }
                        }
                    }
                }
            }
        });
    }

    // Chart Panen per Jenis
    @if($panenPerJenis->count() > 0)
    const ctxPanen = document.getElementById('chartPanenJenis');
    if (ctxPanen) {
        new Chart(ctxPanen.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: @json($panenPerJenis->pluck('jenis_ikan')),
                datasets: [{
                    data: @json($panenPerJenis->pluck('total_berat')),
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b',
                        '#858796',
                        '#5a5c69'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverBorderColor: '#fff',
                    hoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        padding: 12,
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.toFixed(2) + ' Kg';
                                
                                // Calculate percentage
                                let sum = 0;
                                let dataArr = context.chart.data.datasets[0].data;
                                dataArr.forEach(data => {
                                    sum += data;
                                });
                                let percentage = ((context.parsed / sum) * 100).toFixed(1) + '%';
                                
                                return [label, 'Persentase: ' + percentage];
                            }
                        }
                    }
                }
            }
        });
    }
    @endif
});
</script>
@endpush
<style>
.badge-lg {
    font-size: 0.9rem;
    padding: 0.4rem 0.8rem;
}

.position-absolute {
    position: absolute;
    z-index: 10;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.card-img-top-wrapper {
    position: relative;
}
</style>
@endsection