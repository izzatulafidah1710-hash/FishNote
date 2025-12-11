@extends('userlayouts.app')

@section('title', 'Detail Promosi')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-bullhorn text-primary"></i> Detail Promosi
        </h1>
        <div class="btn-group">
            <a href="{{ route('user.promosi.edit', $promosi->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('user.promosi.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Main Content - 60% -->
        <div class="col-lg-7">
            <!-- Header Promosi -->
            <div class="card shadow-sm mb-3">
                <div class="card-body p-3">
                    <h4 class="text-primary mb-2">{{ $promosi->judul_promosi }}</h4>
                    <div class="d-flex flex-wrap">
                        <span class="badge badge-{{ $promosi->status_badge }} mr-2 mb-1">
                            {{ $promosi->status }}
                        </span>
                        <span class="badge badge-success mr-2 mb-1">
                            <i class="fas fa-fish"></i> {{ $promosi->jenis_ikan }}
                        </span>
                        @if($promosi->is_active)
                        <span class="badge badge-info mb-1">
                            <i class="fas fa-check"></i> AKTIF
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Foto Produk -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white py-2">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-camera"></i> Foto Produk
                    </h6>
                </div>
                <div class="card-body p-2">
                    @if($promosi->foto)
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                 alt="{{ $promosi->judul_promosi }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 350px; width: 100%; object-fit: contain;"
                                 onerror="this.src='https://via.placeholder.com/400x300?text=Foto+Tidak+Tersedia';">
                        </div>
                        <div class="text-center mt-2">
                            <a href="{{ asset('storage/' . $promosi->foto) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-search-plus"></i> Lihat Ukuran Penuh
                            </a>
                        </div>
                    @else
                        <div class="bg-light rounded text-center py-5">
                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                            <p class="text-muted mb-0">Tidak ada foto</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white py-2">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle"></i> Deskripsi
                    </h6>
                </div>
                <div class="card-body p-3">
                    <p class="mb-0" style="white-space: pre-wrap;">{{ $promosi->deskripsi }}</p>
                </div>
            </div>

            <!-- Harga & Stok -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white py-2">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-money-bill-wave"></i> Harga & Stok
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-center border rounded py-3">
                                <small class="text-muted d-block mb-1">Harga / {{ $promosi->satuan }}</small>
                                <h4 class="text-success mb-0">Rp {{ number_format($promosi->harga, 0, ',', '.') }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center border rounded py-3">
                                <small class="text-muted d-block mb-1">Stok Tersedia</small>
                                <h4 class="text-primary mb-0">{{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}</h4>
                                @if($promosi->stok_tersedia <= 10)
                                <span class="badge badge-warning mt-1">Terbatas</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Periode -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white py-2">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-calendar"></i> Periode Promosi
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="row text-center">
                        <div class="col-4">
                            <i class="fas fa-calendar-check text-success fa-2x mb-2"></i>
                            <p class="mb-0"><small class="text-muted">Mulai</small></p>
                            <strong>{{ $promosi->tanggal_mulai->format('d/m/Y') }}</strong>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-calendar-times text-danger fa-2x mb-2"></i>
                            <p class="mb-0"><small class="text-muted">Berakhir</small></p>
                            <strong>{{ $promosi->tanggal_berakhir->format('d/m/Y') }}</strong>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-clock text-info fa-2x mb-2"></i>
                            <p class="mb-0"><small class="text-muted">Sisa</small></p>
                            @if($promosi->sisa_hari > 0)
                            <strong class="text-info">{{ $promosi->sisa_hari }} hari</strong>
                            @else
                            <strong class="text-danger">Berakhir</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar - 40% -->
        <div class="col-lg-5">
            <!-- Status Promosi -->
            <div class="card shadow-sm mb-3 {{ $promosi->is_active ? 'border-left-success' : 'border-left-secondary' }}">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="fas fa-circle fa-2x {{ $promosi->is_active ? 'text-success' : 'text-secondary' }}"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold">Status: {{ $promosi->status }}</h6>
                            @if($promosi->is_active)
                            <small class="text-success">
                                <i class="fas fa-check"></i> Aktif • {{ $promosi->sisa_hari }} hari lagi
                            </small>
                            @else
                            <small class="text-muted">
                                <i class="fas fa-times"></i> Tidak aktif
                            </small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="card shadow-sm mb-3 border-left-success">
                <div class="card-body p-3">
                    <h6 class="font-weight-bold text-success mb-3">
                        <i class="fab fa-whatsapp"></i> Hubungi Penjual
                    </h6>
                    <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan {{ urlencode($promosi->judul_promosi) }}" 
                       target="_blank" 
                       class="btn btn-success btn-block">
                        <i class="fab fa-whatsapp"></i> Chat via WhatsApp
                    </a>
                    <hr class="my-2">
                    <p class="mb-1"><small class="text-muted">Nomor:</small></p>
                    <p class="mb-0 font-weight-bold">{{ $promosi->kontak }}</p>
                    @if($promosi->lokasi)
                    <p class="mb-1 mt-2"><small class="text-muted">Lokasi:</small></p>
                    <p class="mb-0">{{ $promosi->lokasi }}</p>
                    @endif
                </div>
            </div>

            <!-- Statistik -->
            <div class="card shadow-sm mb-3">
                <div class="card-body p-3">
                    <h6 class="font-weight-bold text-primary mb-3">
                        <i class="fas fa-chart-bar"></i> Statistik
                    </h6>
                    <div class="row">
                        <div class="col-6 text-center border-right">
                            <i class="fas fa-eye text-info fa-2x mb-2"></i>
                            <p class="mb-0"><small class="text-muted">Dilihat</small></p>
                            <h5 class="mb-0 font-weight-bold">{{ number_format($promosi->views) }}</h5>
                        </div>
                        <div class="col-6 text-center">
                            <i class="fas fa-calendar-plus text-success fa-2x mb-2"></i>
                            <p class="mb-0"><small class="text-muted">Dibuat</small></p>
                            <h6 class="mb-0">{{ $promosi->created_at->format('d/m/Y') }}</h6>
                        </div>
                    </div>
                    @if($promosi->updated_at != $promosi->created_at)
                    <hr class="my-2">
                    <small class="text-muted">
                        <i class="fas fa-edit"></i> Diubah: {{ $promosi->updated_at->format('d/m/Y H:i') }}
                    </small>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white py-2">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cog"></i> Kelola Promosi
                    </h6>
                </div>
                <div class="card-body p-3">
                    <a href="{{ route('user.promosi.edit', $promosi->id) }}" class="btn btn-warning btn-block btn-sm mb-2">
                        <i class="fas fa-edit"></i> Edit Promosi
                    </a>
                    <form action="{{ route('user.promosi.destroy', $promosi->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus promosi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block btn-sm mb-2">
                            <i class="fas fa-trash"></i> Hapus Promosi
                        </button>
                    </form>
                    <a href="{{ route('user.promosi.index') }}" class="btn btn-secondary btn-block btn-sm">
                        <i class="fas fa-list"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.badge {
    font-size: 0.85rem;
    padding: 0.4rem 0.8rem;
}

.border-left-success {
    border-left: 4px solid #1cc88a !important;
}

.border-left-secondary {
    border-left: 4px solid #858796 !important;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075) !important;
}
</style>
@endsection