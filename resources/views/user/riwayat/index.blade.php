@extends('userlayouts.app')

@section('title', 'Riwayat Pencatatan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-history text-primary"></i> Riwayat Pencatatan
        </h1>
        <a href="{{ route('user.riwayat.export') }}" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
    </div>

    <!-- Info Alert -->
    @if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i> {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Aktivitas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAktivitas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pencatatan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPencatatan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Panen
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPanen }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Promosi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPromosi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter"></i> Filter Riwayat
            </h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('user.riwayat.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tipe Aktivitas</label>
                            <select name="tipe" class="form-control">
                                <option value="semua" {{ $tipe == 'semua' ? 'selected' : '' }}>Semua Aktivitas</option>
                                <option value="pencatatan" {{ $tipe == 'pencatatan' ? 'selected' : '' }}>Pencatatan</option>
                                <option value="panen" {{ $tipe == 'panen' ? 'selected' : '' }}>Data Panen</option>
                                <option value="promosi" {{ $tipe == 'promosi' ? 'selected' : '' }}>Promosi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $tanggalMulai }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control" value="{{ $tanggalAkhir }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pencarian</label>
                            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ $search }}">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <a href="{{ route('user.riwayat.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Timeline Riwayat -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-clock"></i> Timeline Aktivitas ({{ $totalAktivitas }} aktivitas)
            </h6>
        </div>
        <div class="card-body">
            @if($riwayat->count() > 0)
            <div class="timeline">
                @foreach($riwayat as $item)
                <div class="timeline-item mb-4">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="timeline-date">
                                <div class="badge badge-{{ $item['color'] }} p-3" style="font-size: 1rem;">
                                    <i class="fas {{ $item['icon'] }}"></i>
                                </div>
                                <div class="mt-2">
                                    <strong>{{ $item['tanggal']->format('d/m/Y') }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $item['tanggal']->format('H:i') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card border-left-{{ $item['color'] }}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="badge badge-{{ $item['color'] }} mb-2">
                                                {{ $item['tipe_label'] }}
                                            </span>
                                            <h5 class="font-weight-bold mb-1">{{ $item['judul'] }}</h5>
                                            <p class="text-muted mb-2">{{ Str::limit($item['deskripsi'], 100) }}</p>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{ $item['route_show'] }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ $item['route_edit'] }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Detail Info -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="text-muted">
                                                <i class="fas fa-fish"></i> <strong>Jenis Ikan:</strong> {{ $item['jenis_ikan'] }}
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-swimming-pool"></i> <strong>Kolam:</strong> {{ $item['kolam'] }}
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($item['detail'] as $key => $value)
                                            <small class="text-muted d-block">
                                                <strong>{{ $key }}:</strong> {{ $value }}
                                            </small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <hr class="my-2">
                                    <small class="text-muted">
                                        <i class="far fa-clock"></i> Dibuat {{ $item['created_at']->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-4x text-gray-300 mb-3"></i>
                <h5 class="text-gray-600">Tidak Ada Riwayat</h5>
                <p class="text-gray-500 mb-3">Belum ada aktivitas yang tercatat atau tidak ada yang sesuai dengan filter.</p>
                <a href="{{ route('user.riwayat.index') }}" class="btn btn-primary">
                    <i class="fas fa-redo"></i> Lihat Semua Riwayat
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
}

.timeline-item {
    position: relative;
}

.timeline-item:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 8.33%;
    top: 80px;
    width: 2px;
    height: calc(100% - 20px);
    background: #e3e6f0;
    z-index: -1;
}

.border-left-info {
    border-left: 4px solid #36b9cc !important;
}

.border-left-success {
    border-left: 4px solid #1cc88a !important;
}

.border-left-warning {
    border-left: 4px solid #f6c23e !important;
}

.border-left-primary {
    border-left: 4px solid #4e73df !important;
}

@media (max-width: 768px) {
    .timeline-item:not(:last-child)::after {
        display: none;
    }
}
</style>
@endsection