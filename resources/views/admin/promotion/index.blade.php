@extends('layouts.app')

@section('title', 'Data Promosi')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Data Promosi</h4>
            <p class="text-muted small mb-0">Kelola seluruh promosi produk peternak yang terdaftar di platform.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-plus mr-1"></i> Tambah Promosi
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

    {{-- Data Table Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Promosi Peternak</h6>
            <span class="badge badge-secondary px-3 py-1">Total: {{ $promotions->total() }} Promosi</span>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="8%" class="text-center">Foto</th>
                            <th>Peternak</th>
                            <th>Judul Promosi</th>
                            <th>Jenis Ikan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th class="text-center">Views</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promotions as $promotion)
                        <tr>
                            <td class="text-center text-muted small font-weight-bold">
                                {{ $loop->iteration + ($promotions->currentPage() - 1) * $promotions->perPage() }}
                            </td>
                            <td class="text-center">
                                @if($promotion->foto)
                                <img src="{{ asset('storage/' . $promotion->foto) }}"
                                     alt="{{ $promotion->judul_promosi }}"
                                     class="rounded-lg border"
                                     style="width: 52px; height: 52px; object-fit: cover;">
                                @else
                                <div class="icon-square bg-primary-light mx-auto" style="width: 52px; height: 52px;">
                                    <i class="fas fa-image" style="font-size: 1.2rem;"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="font-weight-bold text-dark small">{{ $promotion->resident->name ?? 'N/A' }}</div>
                                <small class="text-muted"><i class="fas fa-phone mr-1"></i>{{ $promotion->kontak }}</small>
                            </td>
                            <td>
                                <div class="font-weight-bold text-dark small">{{ Str::limit($promotion->judul_promosi, 35) }}</div>
                                <small class="text-muted">{{ Str::limit($promotion->deskripsi, 40) }}</small>
                            </td>
                            <td><span class="badge badge-info px-2 py-1">{{ $promotion->jenis_ikan }}</span></td>
                            <td>
                                <div class="font-weight-bold text-success small">{{ $promotion->formatted_harga }}</div>
                                <small class="text-muted">per {{ $promotion->satuan }}</small>
                            </td>
                            <td class="text-center">
                                @if($promotion->stok_tersedia > 0)
                                <span class="badge badge-success px-2 py-1">{{ $promotion->stok_tersedia }} {{ $promotion->satuan }}</span>
                                @else
                                <span class="badge badge-danger px-2 py-1">Habis</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted d-block">{{ $promotion->tanggal_mulai->format('d/m/Y') }}</small>
                                <small class="text-muted d-block">s/d {{ $promotion->tanggal_berakhir->format('d/m/Y') }}</small>
                                <span class="badge badge-warning px-2 py-1 mt-1">{{ $promotion->sisa_hari }} hari</span>
                            </td>
                            <td>
                                @if($promotion->status == 'Aktif')
                                <span class="badge badge-success px-2 py-1"><i class="fas fa-check-circle mr-1"></i>Aktif</span>
                                @elseif($promotion->status == 'Habis')
                                <span class="badge badge-danger px-2 py-1"><i class="fas fa-times-circle mr-1"></i>Habis</span>
                                @else
                                <span class="badge badge-secondary px-2 py-1"><i class="fas fa-ban mr-1"></i>Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="text-center font-weight-bold small">
                                <i class="fas fa-eye text-muted mr-1"></i>{{ number_format($promotion->views) }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.datapromosi.show', $promotion->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.promotions.edit', $promotion->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-light text-danger border font-weight-bold"
                                        onclick="confirmDelete({{ $promotion->id }}, '{{ $promotion->judul_promosi }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $promotion->id }}" action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" style="display: none;">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center py-5">
                                <div class="icon-square bg-warning-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada data promosi</p>
                                <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="fas fa-plus mr-1"></i> Tambah Promosi Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($promotions->hasPages())
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan {{ $promotions->firstItem() }} - {{ $promotions->lastItem() }} dari {{ $promotions->total() }} data</small>
                <div>{{ $promotions->links() }}</div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id, judul) {
    if (confirm('Apakah Anda yakin ingin menghapus promosi "' + judul + '"?\n\nData yang dihapus tidak dapat dikembalikan!')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
@endsection