@extends('userlayouts.app')

@section('title', 'Daftar Promosi Saya')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Daftar Promosi Saya</h4>
            <p class="text-muted small mb-0">Kelola promosi produk Anda. Hanya promosi <strong>Aktif</strong> yang tampil di pasar online.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('user.promosi.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-plus mr-1"></i> Tambah Promosi Baru
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

    {{-- Filter Bar --}}
    <div class="card border-0 shadow-sm rounded-lg mb-4">
        <div class="card-body py-3 px-4">
            <form method="GET" action="{{ route('user.daftar-promosi.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Jenis Ikan</label>
                        <select name="jenis_ikan" class="form-control form-control-sm">
                            <option value="">Semua Jenis Ikan</option>
                            <option value="Lele" {{ request('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                            <option value="Nila" {{ request('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                            <option value="Gurame" {{ request('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                            <option value="Mas" {{ request('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                            <option value="Patin" {{ request('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Status</label>
                        <select name="status" class="form-control form-control-sm">
                            <option value="">Semua Status</option>
                            <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="Habis" {{ request('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-3 mr-1">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                        <a href="{{ route('user.daftar-promosi.index') }}" class="btn btn-light btn-sm border font-weight-bold">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Promosi Grid --}}
    @if($promosi->count() > 0)
    <div class="row">
        @foreach($promosi as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100" style="transition: transform 0.2s, box-shadow 0.2s;">
                {{-- Foto --}}
                <div class="position-relative" style="height: 185px; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px; background: #f1f5f9;">
                    @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}"
                         class="w-100 h-100" alt="{{ $item->judul_promosi }}" style="object-fit: cover;"
                         onerror="this.onerror=null; this.src='https://placehold.co/400x200?text=Foto+Promosi'">
                    @else
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
                        <i class="fas fa-image fa-2x mb-2" style="opacity: 0.3;"></i>
                        <small>Foto tidak tersedia</small>
                    </div>
                    @endif
                    <div class="position-absolute" style="top: 10px; right: 10px;">
                        @if($item->status === 'Aktif')
                            <span class="badge badge-success px-3 py-1 font-weight-bold">Aktif</span>
                        @elseif($item->status === 'Habis')
                            <span class="badge badge-warning px-3 py-1">Habis</span>
                        @else
                            <span class="badge badge-secondary px-3 py-1">Tidak Aktif</span>
                        @endif
                    </div>
                </div>

                <div class="card-body p-4 d-flex flex-column">
                    <div class="flex-grow-1">
                        <span class="badge badge-info mb-2">{{ $item->jenis_ikan }}</span>
                        <h6 class="font-weight-bold text-dark mb-1" style="font-size: 0.95rem; line-height: 1.4;">
                            {{ Str::limit($item->judul_promosi, 55) }}
                        </h6>
                        <p class="text-muted small mb-3">{{ Str::limit($item->deskripsi, 80) }}</p>

                        <div class="bg-light rounded-lg p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="text-muted small">Harga</span>
                                <span class="font-weight-bold text-success small">Rp {{ number_format($item->harga, 0, ',', '.') }}/{{ $item->satuan }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="text-muted small">Stok</span>
                                <span class="font-weight-bold small {{ $item->stok_tersedia > 0 ? 'text-dark' : 'text-danger' }}">{{ number_format($item->stok_tersedia) }} {{ $item->satuan }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small">Views</span>
                                <span class="text-muted small">{{ number_format($item->views) }} kali</span>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="d-flex mb-2">
                        <a href="{{ route('user.promosi.show', $item->id) }}" class="btn btn-light btn-sm text-primary border flex-fill mr-1 font-weight-bold">Detail</a>
                        <a href="{{ route('user.promosi.edit', $item->id) }}" class="btn btn-light btn-sm text-warning border flex-fill mr-1 font-weight-bold">Edit</a>
                        <form action="{{ route('user.promosi.destroy', $item->id) }}" method="POST" class="d-inline delete-form" data-confirm-message="Yakin hapus promosi ini?">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm text-danger border font-weight-bold">Hapus</button>
                        </form>
                    </div>
                    <form action="{{ route('user.daftar-promosi.toggle-status', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-block font-weight-bold {{ $item->status === 'Aktif' ? 'btn-light border text-secondary' : 'btn-success' }}">
                            {{ $item->status === 'Aktif' ? 'Nonaktifkan Promosi' : 'Aktifkan Promosi' }}
                        </button>
                    </form>
                </div>

                <div class="card-footer bg-white border-top text-muted small py-2 px-4">
                    <i class="fas fa-clock mr-1"></i> {{ $item->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-2">{{ $promosi->links() }}</div>

    @else
    <div class="card border-0 shadow-sm rounded-lg">
        <div class="card-body text-center py-5">
            <div class="icon-square bg-warning-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h6 class="font-weight-bold text-dark mb-2">Belum Ada Promosi</h6>
            <p class="text-muted small mb-4">Anda belum memiliki promosi. Mulai promosikan hasil budidaya Anda sekarang!</p>
            <a href="{{ route('user.promosi.create') }}" class="btn btn-primary font-weight-bold px-4">
                <i class="fas fa-plus mr-1"></i> Buat Promosi Pertama
            </a>
        </div>
    </div>
    @endif
</div>
@endsection