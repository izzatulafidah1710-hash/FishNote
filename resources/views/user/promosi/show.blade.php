@extends('userlayouts.app')

@section('title', 'Detail Promosi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Promosi</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.promosi.edit', $promosi->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('user.promosi.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Header Promosi -->
                            <div class="mb-4">
                                <h3 class="text-primary">{{ $promosi->judul_promosi }}</h3>
                                <div class="d-flex align-items-center mt-2">
                                    <span class="badge badge-{{ $promosi->status_badge }} badge-lg mr-2">{{ $promosi->status }}</span>
                                    <span class="badge badge-success badge-lg mr-2">{{ $promosi->jenis_ikan }}</span>
                                    @if($promosi->is_active)
                                    <span class="badge badge-info badge-lg">PROMOSI AKTIF</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <h5 class="text-primary"><i class="fas fa-info-circle"></i> Deskripsi Produk</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    {{ $promosi->deskripsi }}
                                </div>
                            </div>

                            <!-- Harga & Stok -->
                            <h5 class="text-primary mt-4"><i class="fas fa-money-bill-wave"></i> Harga & Ketersediaan</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Harga</th>
                                    <td class="font-weight-bold text-success" style="font-size: 1.3rem;">
                                        Rp {{ number_format($promosi->harga, 0, ',', '.') }} / {{ $promosi->satuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Stok Tersedia</th>
                                    <td>
                                        <strong class="text-primary">{{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}</strong>
                                        @if($promosi->stok_tersedia == 0)
                                        <span class="badge badge-danger ml-2">HABIS</span>
                                        @elseif($promosi->stok_tersedia <= 10)
                                        <span class="badge badge-warning ml-2">STOK TERBATAS</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <!-- Kontak & Lokasi -->
                            <h5 class="text-primary mt-4"><i class="fas fa-phone"></i> Informasi Kontak</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Nomor WhatsApp</th>
                                    <td>
                                        <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan {{ $promosi->judul_promosi }}" 
                                           target="_blank" 
                                           class="btn btn-success btn-sm">
                                            <i class="fab fa-whatsapp"></i> {{ $promosi->kontak }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $promosi->lokasi ?: '-' }}</td>
                                </tr>
                            </table>

                            <!-- Periode Promosi -->
                            <h5 class="text-primary mt-4"><i class="fas fa-calendar-alt"></i> Periode Promosi</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Tanggal Mulai</th>
                                    <td>{{ $promosi->tanggal_mulai->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Berakhir</th>
                                    <td>{{ $promosi->tanggal_berakhir->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Sisa Waktu</th>
                                    <td>
                                        @if($promosi->sisa_hari > 0)
                                        <span class="badge badge-info badge-lg">{{ $promosi->sisa_hari }} hari lagi</span>
                                        @else
                                        <span class="badge badge-danger badge-lg">SUDAH BERAKHIR</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <!-- Statistik -->
                            <h5 class="text-primary mt-4"><i class="fas fa-chart-bar"></i> Statistik</h5>
                            <div class="alert alert-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fas fa-eye"></i> <strong>Total Dilihat:</strong> {{ number_format($promosi->views) }} kali
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-clock"></i> <strong>Dibuat:</strong> {{ $promosi->created_at->format('d/m/Y H:i') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Timestamp -->
                            <div class="text-muted small mt-3">
                                <i class="far fa-clock"></i> Dibuat: {{ $promosi->created_at->format('d/m/Y H:i') }}
                                @if($promosi->updated_at != $promosi->created_at)
                                    | <i class="fas fa-edit"></i> Terakhir diubah: {{ $promosi->updated_at->format('d/m/Y H:i') }}
                                @endif
                            </div>
                        </div>

                        <!-- Sidebar: Foto & Actions -->
                        <div class="col-md-4">
                            <!-- Foto Produk -->
                            <h5 class="text-primary"><i class="fas fa-camera"></i> Foto Produk</h5>
                            @if($promosi->foto)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                         alt="Foto Produk" 
                                         class="img-fluid img-thumbnail" 
                                         style="max-height: 400px;"
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300?text=Foto+Tidak+Tersedia';">
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $promosi->foto) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-search-plus"></i> Lihat Full Size
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p class="mb-0">Tidak ada foto produk</p>
                                </div>
                            @endif

                            <!-- Status Card -->
                            <div class="card {{ $promosi->is_active ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                <div class="card-body text-white">
                                    <h5><i class="fas fa-bullhorn"></i> Status Promosi</h5>
                                    <hr class="bg-white">
                                    <p class="mb-2">
                                        <i class="fas fa-circle {{ $promosi->is_active ? 'text-success' : 'text-danger' }}"></i> 
                                        <strong>{{ $promosi->status }}</strong>
                                    </p>
                                    @if($promosi->is_active)
                                    <p class="mb-2">
                                        <i class="fas fa-calendar-check"></i> 
                                        Aktif hingga {{ $promosi->tanggal_berakhir->format('d/m/Y') }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-clock"></i> 
                                        {{ $promosi->sisa_hari }} hari lagi
                                    </p>
                                    @else
                                    <p class="mb-0 text-warning">
                                        <i class="fas fa-exclamation-triangle"></i> 
                                        Promosi tidak aktif atau sudah berakhir
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Quick Contact -->
                            <div class="card bg-gradient-info">
                                <div class="card-body text-white">
                                    <h5><i class="fas fa-phone"></i> Hubungi Penjual</h5>
                                    <hr class="bg-white">
                                    <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan {{ $promosi->judul_promosi }}" 
                                       target="_blank" 
                                       class="btn btn-success btn-block">
                                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                                    </a>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-3">
                                <a href="{{ route('user.promosi.edit', $promosi->id) }}" class="btn btn-warning btn-block">
                                    <i class="fas fa-edit"></i> Edit Promosi
                                </a>
                                <form action="{{ route('user.promosi.destroy', $promosi->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin ingin menghapus promosi ini?')">
                                        <i class="fas fa-trash"></i> Hapus Promosi
                                    </button>
                                </form>
                                <a href="{{ route('user.promosi.index') }}" class="btn btn-secondary btn-block mt-2">
                                    <i class="fas fa-list"></i> Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-lg {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}
</style>
@endsection