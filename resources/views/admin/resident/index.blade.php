@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-users text-primary"></i> Data Peternak
        </h1>
        <a href="{{ route('admin.datapeternak.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Peternak
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Alert Error -->
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTable Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Peternak Terdaftar
            </h6>
            <span class="badge badge-primary badge-pill">
                Total: {{ $residents->total() }} Peternak
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Lokasi Budidaya</th>
                            <th>Status</th>
                            <th>Terdaftar</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residents as $resident)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration + ($residents->currentPage() - 1) * $residents->perPage() }}
                            </td>
                            <td>
                                <strong>{{ $resident->name }}</strong>
                                @if($resident->jenis_usaha)
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-briefcase"></i> {{ $resident->jenis_usaha }}
                                    </small>
                                @endif
                            </td>
                            <td>
                                <i class="fas fa-envelope text-muted"></i> {{ $resident->email }}
                                @if($resident->user)
                                    <br>
                                    <small class="badge badge-info">
                                        <i class="fas fa-user"></i> Role: {{ ucfirst($resident->user->role) }}
                                    </small>
                                @endif
                            </td>
                            <td>
                                @if($resident->phone)
                                    <i class="fas fa-phone text-muted"></i> {{ $resident->phone }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($resident->address)
                                    {{ Str::limit($resident->address, 40) }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($resident->farm_location)
                                    <i class="fas fa-map-marker-alt text-primary"></i> {{ $resident->farm_location }}
                                    @if($resident->luas_lahan)
                                        <br><small class="text-muted">{{ $resident->luas_lahan }} m²</small>
                                    @endif
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($resident->status == 'aktif')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-times-circle"></i> Non-aktif
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <small>{{ $resident->created_at->format('d/m/Y') }}</small>
                                <br>
                                <small class="text-muted">{{ $resident->created_at->diffForHumans() }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <!-- Tombol Edit  -->
                                    <a href="{{ route('admin.datapeternak.edit', $resident->id) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit Data"
                                       data-toggle="tooltip">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <button type="button"
                                            class="btn btn-sm btn-danger" 
                                            title="Hapus Data"
                                            data-toggle="tooltip"
                                            onclick="confirmDelete({{ $resident->id }}, '{{ $resident->name }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <!-- Form Delete (Hidden) -->
                                <form id="delete-form-{{ $resident->id }}" 
                                      action="{{ route('admin.datapeternak.delete', $resident->id) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data peternak terdaftar</p>
                                <a href="{{ route('admin.datapeternak.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Peternak Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($residents->hasPages())
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan {{ $residents->firstItem() }} - {{ $residents->lastItem() }} 
                        dari {{ $residents->total() }} data
                    </small>
                </div>
                <div>
                    {{ $residents->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
// Konfirmasi hapus dengan SweetAlert atau Confirm
function confirmDelete(id, name) {
    if (confirm('Apakah Anda yakin ingin menghapus data peternak "' + name + '"?\n\nSemua data terkait (pencatatan, panen, promosi) juga akan terhapus!')) {
        document.getElementById('delete-form-' + id).submit();
    }
}

// Tooltip Bootstrap
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endpush
@endsection