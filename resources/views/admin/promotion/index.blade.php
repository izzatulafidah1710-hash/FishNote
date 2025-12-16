@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-bullhorn text-primary"></i> Data Promosi
        </h1>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Promosi
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
                Daftar Promosi Peternak
            </h6>
            <span class="badge badge-primary badge-pill">
                Total: {{ $promotions->total() }} Promosi
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Foto</th>
                            <th>Peternak</th>
                            <th>Judul Promosi</th>
                            <th>Jenis Ikan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promotions as $promotion)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration + ($promotions->currentPage() - 1) * $promotions->perPage() }}
                            </td>
                            <td class="text-center">
                                @if($promotion->foto)
                                    <img src="{{ asset('storage/' . $promotion->foto) }}" 
                                         alt="{{ $promotion->judul_promosi }}" 
                                         class="img-thumbnail" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 80px;">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $promotion->resident->name ?? 'N/A' }}</strong>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-phone"></i> {{ $promotion->kontak }}
                                </small>
                            </td>
                            <td>
                                <strong>{{ $promotion->judul_promosi }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ Str::limit($promotion->deskripsi, 50) }}
                                </small>
                            </td>
                            <td>
                                <span class="badge badge-info">
                                    {{ $promotion->jenis_ikan }}
                                </span>
                            </td>
                            <td>
                                <strong>{{ $promotion->formatted_harga }}</strong>
                                <br>
                                <small class="text-muted">per {{ $promotion->satuan }}</small>
                            </td>
                            <td class="text-center">
                                @if($promotion->stok_tersedia > 0)
                                    <span class="badge badge-success">
                                        {{ $promotion->stok_tersedia }} {{ $promotion->satuan }}
                                    </span>
                                @else
                                    <span class="badge badge-danger">Habis</span>
                                @endif
                            </td>
                            <td>
                                <small>
                                    {{ $promotion->tanggal_mulai->format('d/m/Y') }}
                                    <br>s/d<br>
                                    {{ $promotion->tanggal_berakhir->format('d/m/Y') }}
                                </small>
                                <br>
                                <small class="badge badge-warning">
                                    {{ $promotion->sisa_hari }} hari lagi
                                </small>
                            </td>
                            <td class="text-center">
                                @if($promotion->status == 'Aktif')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @elseif($promotion->status == 'Habis')
                                    <span class="badge badge-danger">
                                        <i class="fas fa-times-circle"></i> Habis
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-ban"></i> Tidak Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <i class="fas fa-eye text-muted"></i> {{ $promotion->views }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group-vertical" role="group">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.promotions.edit', $promotion->id) }}" 
                                       class="btn btn-sm btn-warning mb-1" 
                                       title="Edit"
                                       data-toggle="tooltip">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <button type="button"
                                            class="btn btn-sm btn-danger" 
                                            title="Hapus"
                                            data-toggle="tooltip"
                                            onclick="confirmDelete({{ $promotion->id }}, '{{ $promotion->judul_promosi }}')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Form Delete (Hidden) -->
                                <form id="delete-form-{{ $promotion->id }}" 
                                      action="{{ route('admin.promotions.destroy', $promotion->id) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data promosi</p>
                                <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Promosi Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($promotions->hasPages())
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan {{ $promotions->firstItem() }} - {{ $promotions->lastItem() }} 
                        dari {{ $promotions->total() }} data
                    </small>
                </div>
                <div>
                    {{ $promotions->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
// Konfirmasi hapus
function confirmDelete(id, judul) {
    if (confirm('Apakah Anda yakin ingin menghapus promosi "' + judul + '"?\n\nData yang dihapus tidak dapat dikembalikan!')) {
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