@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chart-line text-primary"></i> Aktivitas Peternak
        </h1>
        <div>
            <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-sync"></i> Refresh
            </a>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Hari Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $stats['total_today'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Minggu Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $stats['total_week'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $stats['total_month'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Semua
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $stats['total_all'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter"></i> Filter Aktivitas
            </h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.aktivitas.index') }}" class="form-inline">
                <!-- Filter Peternak -->
                <div class="form-group mr-3 mb-2">
                    <label class="mr-2">Peternak:</label>
                    <select name="peternak_id" class="form-control form-control-sm">
                        <option value="">Semua Peternak</option>
                        @foreach($peternaks as $peternak)
                            <option value="{{ $peternak->id }}" 
                                    {{ request('peternak_id') == $peternak->id ? 'selected' : '' }}>
                                {{ $peternak->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Jenis Aktivitas -->
                <div class="form-group mr-3 mb-2">
                    <label class="mr-2">Jenis:</label>
                    <select name="activity_type" class="form-control form-control-sm">
                        <option value="">Semua Jenis</option>
                        <option value="Pencatatan" {{ request('activity_type') == 'Pencatatan' ? 'selected' : '' }}>Pencatatan</option>
                        <option value="Panen" {{ request('activity_type') == 'Panen' ? 'selected' : '' }}>Panen</option>
                        <option value="Promosi" {{ request('activity_type') == 'Promosi' ? 'selected' : '' }}>Promosi</option>
                    </select>
                </div>

                <!-- Filter Periode -->
                <div class="form-group mr-3 mb-2">
                    <label class="mr-2">Periode:</label>
                    <select name="periode" class="form-control form-control-sm">
                        <option value="">Semua Waktu</option>
                        <option value="today" {{ request('periode') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="week" {{ request('periode') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="month" {{ request('periode') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm mb-2">
                    <i class="fas fa-search"></i> Filter
                </button>
                <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-secondary btn-sm mb-2 ml-2">
                    <i class="fas fa-redo"></i> Reset
                </a>
            </form>
        </div>
    </div>

    <!-- Activities Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Aktivitas
            </h6>
            <span class="badge badge-primary badge-pill">
                Total: {{ $activities->total() }} Aktivitas
            </span>
        </div>
        <div class="card-body">
            @if($activities->count() == 0)
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                    <p class="mb-0">Belum ada aktivitas yang sesuai dengan filter.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Peternak</th>
                                <th width="12%">Jenis Aktivitas</th>
                                <th>Deskripsi</th>
                                <th width="15%">Waktu</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration + ($activities->currentPage() - 1) * $activities->perPage() }}
                                    </td>
                                    <td>
                                        <strong>{{ $activity->peternak->name ?? 'N/A' }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            ID: {{ $activity->peternak_id }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $activity->badge_color }} badge-pill">
                                            <i class="fas {{ $activity->icon }}"></i>
                                            {{ $activity->activity_type }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $activity->description }}
                                        @if($activity->related_module)
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-link"></i> 
                                                {{ ucfirst($activity->related_module) }}
                                                @if($activity->related_id)
                                                    #{{ $activity->related_id }}
                                                @endif
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <small>
                                            {{ $activity->created_at->format('d/m/Y H:i') }}
                                            <br>
                                            <span class="text-muted">
                                                {{ $activity->created_at->diffForHumans() }}
                                            </span>
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" 
                                                class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $activity->id }})"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $activity->id }}" 
                                              action="{{ route('admin.aktivitas.delete', $activity->id) }}" 
                                              method="POST" 
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($activities->hasPages())
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">
                            Menampilkan {{ $activities->firstItem() }} - {{ $activities->lastItem() }} 
                            dari {{ $activities->total() }} data
                        </small>
                    </div>
                    <div>
                        {{ $activities->appends(request()->query())->links() }}
                    </div>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
@endsection