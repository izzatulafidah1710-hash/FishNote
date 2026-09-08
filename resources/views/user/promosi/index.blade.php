@extends('userlayouts.app')

@section('title', 'Promosi Saya')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Promosi Saya</h4>
            <p class="text-muted small mb-0">Pasarkan hasil panen budidaya Anda kepada calon pembeli dan distributor.</p>
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Stat Cards (Vizora style same as dashboard) --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Listing Promosi</span>
                        <div class="icon-square bg-info-light">
                            <i class="fas fa-store"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPromosi) }}</h3>
                        <span class="trend-badge-info">Listing</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Semua promosi terdaftar</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Promosi Tayang / Aktif</span>
                        <div class="icon-square bg-success-light">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($promosiAktif) }}</h3>
                        <span class="trend-badge-success">Aktif</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Tayang di marketplace</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Views Calon Pembeli</span>
                        <div class="icon-square bg-warning-light">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalViews) }}</h3>
                        <span class="trend-badge-warning">Tayangan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Dilihat oleh pembeli</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Data Table Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Listing Promosi Saya</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $totalPromosi }} Total</span>
        </div>

        <div class="card-body p-4">
            {{-- Filter Form --}}
            <div class="bg-light rounded-lg border p-3 mb-4">
                <form method="GET" action="{{ route('user.promosi.index') }}">
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
                            <label class="small font-weight-bold text-dark mb-1">Status Penayangan</label>
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
                            <a href="{{ route('user.promosi.index') }}" class="btn btn-light btn-sm border font-weight-bold">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Data Table --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Judul Promosi</th>
                            <th>Jenis Ikan</th>
                            <th>Harga Jual</th>
                            <th>Stok Tersedia</th>
                            <th>Periode Tayang</th>
                            <th>Status</th>
                            <th class="text-center">Views</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promosi as $item)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">{{ $loop->iteration + ($promosi->currentPage() - 1) * $promosi->perPage() }}</td>
                            <td>
                                <div class="font-weight-bold text-dark" style="font-size: 0.875rem;">{{ Str::limit($item->judul_promosi, 40) }}</div>
                            </td>
                            <td>
                                <span class="badge badge-info px-3 py-1">{{ $item->jenis_ikan }}</span>
                            </td>
                            <td class="font-weight-bold text-success small">
                                Rp {{ number_format($item->harga, 0, ',', '.') }} <small class="text-muted">/ {{ $item->satuan }}</small>
                            </td>
                            <td class="font-weight-bold small">{{ number_format($item->stok_tersedia) }} {{ $item->satuan }}</td>
                            <td>
                                <small class="text-muted">{{ $item->tanggal_mulai->format('d/m/Y') }} — {{ $item->tanggal_berakhir->format('d/m/Y') }}</small>
                            </td>
                            <td>
                                @if($item->status == 'Aktif')
                                    <span class="badge badge-success px-3 py-1">Aktif</span>
                                @elseif($item->status == 'Habis')
                                    <span class="badge badge-warning px-3 py-1">Stok Habis</span>
                                @else
                                    <span class="badge badge-secondary px-3 py-1">Non-aktif</span>
                                @endif
                            </td>
                            <td class="text-center font-weight-bold text-dark small">{{ number_format($item->views) }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.promosi.show', $item->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1">Detail</a>
                                <a href="{{ route('user.promosi.edit', $item->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1">Edit</a>
                                <form action="{{ route('user.promosi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus promosi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger border font-weight-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="icon-square bg-warning-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada promosi yang dibuat</p>
                                <small class="text-muted">Klik tombol "Tambah Promosi Baru" untuk mempromosikan hasil panen Anda.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="small text-muted">
                    Menampilkan {{ $promosi->firstItem() ?? 0 }} - {{ $promosi->lastItem() ?? 0 }} dari {{ $promosi->total() }} data
                </div>
                <div>{{ $promosi->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection