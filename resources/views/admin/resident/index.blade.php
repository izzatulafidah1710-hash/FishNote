@extends('layouts.app')

@section('title', 'Data Peternak')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as admin dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Data Peternak</h4>
            <p class="text-muted small mb-0">Manajemen akun mitra peternak, lokasi budidaya, dan luas lahan usaha perikanan.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('admin.datapeternak.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-user-plus mr-1"></i> Tambah Peternak Baru
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

    @if(session('error'))
    <div class="alert alert-danger border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        <i class="fas fa-exclamation-triangle mr-2 text-danger"></i>
        <strong>Gagal!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    {{-- Stat Cards (Vizora style) --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Terdaftar</span>
                        <div class="icon-square bg-primary-light"><i class="fas fa-users"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalResidents ?? 0) }}</h3>
                        <span class="trend-badge-info">Mitra Peternak</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Seluruh peternak terdaftar</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Peternak Aktif</span>
                        <div class="icon-square bg-success-light"><i class="fas fa-user-check"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($activeResidents ?? 0) }}</h3>
                        <span class="trend-badge-success">Status Aktif</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Akun aktif saat ini</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Luas Lahan</span>
                        <div class="icon-square bg-info-light"><i class="fas fa-map-marked-alt"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalFarmArea ?? 0, 0) }} <small class="text-muted" style="font-size: 13px;">m²</small></h3>
                        <span class="trend-badge-info">Budidaya</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total area kolam perikanan</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- DataTable Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Peternak Terdaftar</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $totalResidents ?? 0 }} Total</span>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Nama Peternak</th>
                            <th>Kontak Email</th>
                            <th>No. Telepon</th>
                            <th>Alamat Utama</th>
                            <th>Lokasi Budidaya</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Terdaftar</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residents as $resident)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">
                                {{ $loop->iteration + ($residents->currentPage() - 1) * $residents->perPage() }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($resident->name) }}&background=1d4ed8&color=fff&size=32"
                                         class="rounded-circle mr-2 flex-shrink-0" style="width: 32px; height: 32px;">
                                    <div>
                                        <div class="font-weight-bold text-dark" style="font-size: 0.875rem;">{{ $resident->name }}</div>
                                        @if($resident->jenis_usaha)
                                        <small class="text-muted"><i class="fas fa-briefcase mr-1"></i>{{ $resident->jenis_usaha }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="small text-dark"><i class="fas fa-envelope text-primary mr-1"></i>{{ $resident->email }}</div>
                                @if($resident->user)
                                <span class="badge badge-info badge-pill px-2" style="font-size: 10px;">Role: {{ ucfirst($resident->user->role) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($resident->phone)
                                <span class="small text-dark"><i class="fas fa-phone text-success mr-1"></i>{{ $resident->phone }}</span>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">{{ $resident->address ? Str::limit($resident->address, 35) : '-' }}</small>
                            </td>
                            <td>
                                @if($resident->farm_location)
                                <span class="small font-weight-bold text-dark"><i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $resident->farm_location }}</span>
                                @if($resident->luas_lahan)
                                <div><small class="text-muted">{{ number_format($resident->luas_lahan) }} m²</small></div>
                                @endif
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($resident->status == 'aktif')
                                <span class="badge badge-success px-3 py-1"><i class="fas fa-check-circle mr-1"></i>Aktif</span>
                                @else
                                <span class="badge badge-secondary px-3 py-1"><i class="fas fa-times-circle mr-1"></i>Non-aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="font-weight-bold small">{{ $resident->created_at->format('d M Y') }}</div>
                                <small class="text-muted">{{ $resident->created_at->diffForHumans() }}</small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.datapeternak.show', $resident->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.datapeternak.edit', $resident->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-light text-danger border font-weight-bold"
                                        onclick="confirmDelete({{ $resident->id }}, '{{ $resident->name }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $resident->id }}" action="{{ route('admin.datapeternak.delete', $resident->id) }}" method="POST" style="display: none;">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="icon-square bg-primary-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada data peternak terdaftar</p>
                                <a href="{{ route('admin.datapeternak.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="fas fa-plus mr-1"></i> Tambah Peternak Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($residents->hasPages())
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan {{ $residents->firstItem() }} - {{ $residents->lastItem() }} dari {{ $residents->total() }} data</small>
                <div>{{ $residents->links() }}</div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id, name) {
    Swal.fire({
        title: 'Hapus Data Peternak?',
        text: 'Apakah Anda yakin ingin menghapus data peternak "' + name + '"? Semua data terkait akan terhapus secara permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endpush
@endsection