@extends('userlayouts.app')

@section('title', 'Daftar Promosi')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-list text-primary"></i> Daftar Promosi
        </h1>
        <a href="{{ route('user.promosi.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Promosi Baru
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

    <!-- Info Card -->
    <div class="card border-left-info shadow mb-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Preview Promosi
                    </div>
                    <div class="h6 mb-0 text-gray-800">
                        Lihat dan edit tampilan promosi Anda sebelum ditampilkan ke halaman publik. Hanya promosi dengan status <strong>"Aktif"</strong> yang akan muncul di halaman utama website.
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-eye fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Promosi</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('user.daftar-promosi.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jenis Ikan</label>
                            <select name="jenis_ikan" class="form-control">
                                <option value="">Semua Jenis Ikan</option>
                                <option value="Lele" {{ request('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                                <option value="Nila" {{ request('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                                <option value="Gurame" {{ request('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                <option value="Mas" {{ request('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                                <option value="Patin" {{ request('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">Semua Status</option>
                                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                <option value="Habis" {{ request('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <a href="{{ route('user.daftar-promosi.index') }}" class="btn btn-secondary">
                                <i class="fas fa-redo"></i> Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Promosi Card -->
    @if($promosi->count() > 0)
    <div class="row">
        @foreach($promosi as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow h-100 {{ $item->status === 'Aktif' ? 'border-left-success' : 'border-left-secondary' }}">
                <!-- Foto Produk -->
                <div class="card-img-top-wrapper" style="height: 200px; overflow: hidden; background: #f8f9fc;">
                    @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" 
                         class="card-img-top" 
                         alt="{{ $item->judul_promosi }}"
                         style="width: 100%; height: 100%; object-fit: cover;"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200?text=Foto+Promosi';">
                    @else
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fas fa-image fa-3x text-gray-300"></i>
                    </div>
                    @endif
                </div>

                <!-- Badge Status -->
                <div class="position-absolute" style="top: 10px; right: 10px;">
                    <span class="badge badge-{{ $item->status_badge }} badge-lg shadow">
                        {{ $item->status }}
                    </span>
                </div>

                <div class="card-body">
                    <!-- Judul -->
                    <h5 class="card-title text-primary font-weight-bold mb-2">
                        {{ Str::limit($item->judul_promosi, 50) }}
                    </h5>

                    <!-- Jenis Ikan -->
                    <span class="badge badge-success mb-2">
                        <i class="fas fa-fish"></i> {{ $item->jenis_ikan }}
                    </span>

                    <!-- Deskripsi -->
                    <p class="card-text text-gray-700 small mb-3">
                        {{ Str::limit($item->deskripsi, 100) }}
                    </p>

                    <!-- Info -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">
                                <i class="fas fa-money-bill-wave"></i> Harga
                            </span>
                            <span class="font-weight-bold text-success">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}/{{ $item->satuan }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">
                                <i class="fas fa-box"></i> Stok
                            </span>
                            <span class="font-weight-bold {{ $item->stok_tersedia > 0 ? 'text-primary' : 'text-danger' }}">
                                {{ number_format($item->stok_tersedia) }} {{ $item->satuan }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="fas fa-eye"></i> Dilihat
                            </span>
                            <span class="text-gray-700">
                                {{ number_format($item->views) }} kali
                            </span>
                        </div>
                    </div>

                    <!-- Periode -->
                    <div class="alert alert-light py-2 px-2 mb-3">
                        <small>
                            <i class="far fa-calendar-alt"></i> 
                            {{ $item->tanggal_mulai->format('d/m/Y') }} - {{ $item->tanggal_berakhir->format('d/m/Y') }}
                        </small>
                        @if($item->sisa_hari > 0)
                        <br>
                        <small class="text-info">
                            <i class="fas fa-clock"></i> {{ $item->sisa_hari }} hari lagi
                        </small>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="btn-group btn-group-sm w-100 mb-2" role="group">
                        <a href="{{ route('user.promosi.show', $item->id) }}" class="btn btn-info" title="Lihat Detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <a href="{{ route('user.promosi.edit', $item->id) }}" class="btn btn-warning" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('user.promosi.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus promosi ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Toggle Status -->
                    <form action="{{ route('user.daftar-promosi.toggle-status', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-{{ $item->status === 'Aktif' ? 'secondary' : 'success' }} btn-sm btn-block">
                            @if($item->status === 'Aktif')
                            <i class="fas fa-eye-slash"></i> Nonaktifkan
                            @else
                            <i class="fas fa-check"></i> Aktifkan
                            @endif
                        </button>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="card-footer text-muted small">
                    <i class="far fa-clock"></i> Dibuat {{ $item->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $promosi->links() }}
    </div>

    @else
    <!-- Empty State -->
    <div class="card shadow">
        <div class="card-body text-center py-5">
            <i class="fas fa-inbox fa-4x text-gray-300 mb-3"></i>
            <h5 class="text-gray-600">Belum Ada Promosi</h5>
            <p class="text-gray-500 mb-3">Anda belum membuat promosi apapun. Mulai buat promosi untuk menawarkan produk Anda!</p>
            <a href="{{ route('user.promosi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Promosi Pertama
            </a>
        </div>
    </div>
    @endif
</div>

{{-- <style>
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
</style> --}}
@endsection