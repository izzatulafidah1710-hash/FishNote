@extends('layouts.app')

@section('title', 'Log Aktivitas Peternak')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (Vizora style) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Log Aktivitas Peternak</h4>
            <p class="text-muted small mb-0">Pantau seluruh catatan riwayat pencatatan, panen, dan promosi peternak mitra secara realtime.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-light border text-dark font-weight-bold px-3 py-2 shadow-sm rounded-lg" style="font-size: 0.85rem;">
                <i class="fas fa-sync-alt mr-1"></i> Refresh Data
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        <i class="fas fa-check-circle mr-2 text-success"></i>
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    {{-- Stat Cards (Vizora SaaS Style) --}}
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Aktivitas Hari Ini</span>
                        <div class="icon-square bg-primary-light"><i class="fas fa-calendar-day"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($stats['total_today'] ?? 0) }}</h3>
                        <span class="trend-badge-info">Hari Ini</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Catatan aktivitas 24 jam terakhir</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Minggu Ini</span>
                        <div class="icon-square bg-success-light"><i class="fas fa-calendar-week"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($stats['total_week'] ?? 0) }}</h3>
                        <span class="trend-badge-success">7 Hari</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Aktivitas 7 hari terakhir</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Bulan Ini</span>
                        <div class="icon-square bg-info-light"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($stats['total_month'] ?? 0) }}</h3>
                        <span class="trend-badge-info">30 Hari</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Aktivitas bulan berjalan</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Akumulasi</span>
                        <div class="icon-square bg-warning-light"><i class="fas fa-clipboard-list"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($stats['total_all'] ?? 0) }}</h3>
                        <span class="trend-badge-warning">Keseluruhan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total riwayat tercatat</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="card border-0 shadow-sm rounded-lg mb-4">
        <div class="card-body p-3">
            <form method="GET" action="{{ route('admin.aktivitas.index') }}" class="row align-items-center">
                <!-- Filter Peternak -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <label class="small text-muted font-weight-bold mb-1">Peternak</label>
                    <select name="peternak_id" class="form-control form-control-sm border-light bg-light rounded-lg">
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
                <div class="col-md-3 mb-2 mb-md-0">
                    <label class="small text-muted font-weight-bold mb-1">Jenis Aktivitas</label>
                    <select name="activity_type" class="form-control form-control-sm border-light bg-light rounded-lg">
                        <option value="">Semua Jenis</option>
                        <option value="Pencatatan" {{ request('activity_type') == 'Pencatatan' ? 'selected' : '' }}>Pencatatan</option>
                        <option value="Panen" {{ request('activity_type') == 'Panen' ? 'selected' : '' }}>Panen</option>
                        <option value="Promosi" {{ request('activity_type') == 'Promosi' ? 'selected' : '' }}>Promosi</option>
                    </select>
                </div>

                <!-- Filter Periode -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <label class="small text-muted font-weight-bold mb-1">Periode Waktu</label>
                    <select name="periode" class="form-control form-control-sm border-light bg-light rounded-lg">
                        <option value="">Semua Waktu</option>
                        <option value="today" {{ request('periode') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="week" {{ request('periode') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="month" {{ request('periode') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-end mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold mr-2 px-3 py-1 shadow-sm rounded-lg" style="height: 31px;">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-light border btn-sm text-dark font-weight-bold px-3 py-1 rounded-lg" style="height: 31px;">
                        <i class="fas fa-redo mr-1"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Activities Table Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Log Aktivitas</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $activities->total() }} Record</span>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="18%">Peternak</th>
                            <th width="14%" class="text-center">Jenis</th>
                            <th>Deskripsi Aktivitas</th>
                            <th width="16%">Waktu</th>
                            <th width="8%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities as $activity)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">
                                {{ $loop->iteration + ($activities->currentPage() - 1) * $activities->perPage() }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($activity->peternak->name ?? 'Peternak') }}&background=1d4ed8&color=fff&size=32"
                                         class="rounded-circle mr-2 flex-shrink-0" style="width: 32px; height: 32px;">
                                    <div>
                                        <div class="font-weight-bold text-dark" style="font-size: 0.875rem;">{{ $activity->peternak->name ?? 'N/A' }}</div>
                                        <small class="text-muted">ID: {{ $activity->peternak_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-{{ $activity->badge_color ?? 'primary' }} px-3 py-1">
                                    <i class="fas {{ $activity->icon ?? 'fa-info-circle' }} mr-1"></i>
                                    {{ $activity->activity_type }}
                                </span>
                            </td>
                            <td>
                                <div class="text-dark small font-weight-bold">{{ $activity->description }}</div>
                                @if($activity->related_module)
                                <small class="text-muted">
                                    <i class="fas fa-link mr-1"></i>{{ ucfirst($activity->related_module) }}
                                    @if($activity->related_id) #{{ $activity->related_id }} @endif
                                </small>
                                @endif
                            </td>
                            <td>
                                <div class="font-weight-bold small text-dark">{{ $activity->created_at->format('d M Y, H:i') }}</div>
                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                            </td>
                            <td class="text-center">
                                <button type="button" 
                                        class="btn btn-sm btn-light text-danger border font-weight-bold"
                                        onclick="confirmDelete({{ $activity->id }})"
                                        title="Hapus Log">
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
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="icon-square bg-primary-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-history"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada aktivitas yang sesuai filter</p>
                                <small class="text-muted">Silakan ubah kriteria filter untuk menampilkan data.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($activities->hasPages())
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan {{ $activities->firstItem() }} - {{ $activities->lastItem() }} dari {{ $activities->total() }} data</small>
                <div>{{ $activities->appends(request()->query())->links() }}</div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus catatan aktivitas ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
@endsection