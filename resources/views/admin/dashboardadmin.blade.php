@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt me-2 text-primary"></i>Dashboard Administrator</h1>
        <span class="badge bg-primary px-3 py-2 text-white" style="font-size: 14px;">
            <i class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Content Row - Cards -->
    <div class="row">
        <!-- Total Peternak Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Peternak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPeternak) }}</div>
                            <small class="text-success"><i class="fas fa-user-check me-1"></i>{{ $peternakAktif }} Aktif</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promosi Aktif Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Promosi Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($promosiAktif) }}</div>
                            <small class="text-muted">Dari {{ $totalPromosi }} total promosi</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Panen Bulan Ini Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Panen Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalBeratPanenBulanIni, 1) }} Kg</div>
                            <small class="text-info"><i class="fas fa-boxes me-1"></i>{{ $totalPanenBulanIni }} Transaksi</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fish fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perputaran Nilai Panen Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Nilai Hasil Panen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalPendapatanPanenBulanIni, 0, ',', '.') }}</div>
                            <small class="text-muted">Bulan ini</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row - Tables & Quick Actions -->
    <div class="row">
        <!-- Peternak Baru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus me-2"></i>Peternak Terbaru</h6>
                    <a href="{{ route('admin.datapeternak.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentPeternak as $resident)
                                    <tr>
                                        <td>
                                            <strong>{{ $resident->name }}</strong>
                                            @if($resident->farm_location)
                                                <br><small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $resident->farm_location }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $resident->email }}</td>
                                        <td>
                                            @if($resident->status === 'aktif')
                                                <span class="badge bg-success text-white">Aktif</span>
                                            @else
                                                <span class="badge bg-danger text-white">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.datapeternak.edit', $resident->id) }}" class="btn btn-sm btn-circle btn-info" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3 text-muted">Belum ada data peternak</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promosi Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-between">
                    <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-bullhorn me-2"></i>Promosi Terbaru</h6>
                    <a href="{{ route('admin.datapromosi.index') }}" class="btn btn-sm btn-success">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Judul Promosi</th>
                                    <th>Peternak</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentPromosi as $promosi)
                                    <tr>
                                        <td>
                                            <strong>{{ $promosi->judul_promosi }}</strong>
                                            <br><small class="text-muted">{{ $promosi->jenis_ikan }}</small>
                                        </td>
                                        <td>{{ $promosi->resident->name ?? ($promosi->user->name ?? 'N/A') }}</td>
                                        <td>Rp {{ number_format($promosi->harga, 0, ',', '.') }}/{{ $promosi->satuan }}</td>
                                        <td>
                                            @if($promosi->status === 'Aktif')
                                                <span class="badge bg-success text-white">Aktif</span>
                                            @elseif($promosi->status === 'Habis')
                                                <span class="badge bg-warning text-dark">Habis</span>
                                            @else
                                                <span class="badge bg-secondary text-white">Tidak Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3 text-muted">Belum ada promosi</td>
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
@endsection
