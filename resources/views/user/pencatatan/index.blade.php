@extends('userlayouts.app')

@section('title', 'Pencatatan Aktivitas')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Pencatatan Aktivitas</h4>
            <p class="text-muted small mb-0">Dokumentasikan pemberian pakan, pengecekan air, perawatan, dan biaya harian kolam Anda.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('user.pencatatan.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-plus mr-1"></i> Tambah Pencatatan
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
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Catatan</span>
                        <div class="icon-square bg-primary-light">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPencatatan ?? 0) }}</h3>
                        <span class="trend-badge-info">Aktivitas</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Seluruh catatan</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Bulan Ini</span>
                        <div class="icon-square bg-success-light">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($pencatatanBulanIni ?? 0) }}</h3>
                        <span class="trend-badge-success">Catatan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Aktivitas bulan berjalan</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Biaya Operasional</span>
                        <div class="icon-square bg-warning-light">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.35rem;">Rp {{ number_format($totalBiaya ?? 0, 0, ',', '.') }}</h3>
                        <span class="trend-badge-warning">Biaya</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total pengeluaran operasional</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Data Table Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Riwayat Pencatatan</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $totalPencatatan ?? 0 }} Total</span>
        </div>

        <div class="card-body p-4">
            {{-- Filter Form --}}
            <div class="bg-light rounded-lg border p-3 mb-4">
                <form method="GET" action="{{ route('user.pencatatan.index') }}">
                    <div class="row align-items-end">
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Jenis Kegiatan</label>
                            <select name="jenis_kegiatan" class="form-control form-control-sm">
                                <option value="">Semua Kegiatan</option>
                                <option value="Pemberian Pakan" {{ request('jenis_kegiatan') == 'Pemberian Pakan' ? 'selected' : '' }}>Pemberian Pakan</option>
                                <option value="Pengecekan Air" {{ request('jenis_kegiatan') == 'Pengecekan Air' ? 'selected' : '' }}>Pengecekan Air</option>
                                <option value="Panen" {{ request('jenis_kegiatan') == 'Panen' ? 'selected' : '' }}>Panen</option>
                                <option value="Perawatan" {{ request('jenis_kegiatan') == 'Perawatan' ? 'selected' : '' }}>Perawatan</option>
                                <option value="Lainnya" {{ request('jenis_kegiatan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Mulai Tanggal</label>
                            <input type="date" name="tanggal_mulai" class="form-control form-control-sm" value="{{ request('tanggal_mulai') }}">
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Sampai Tanggal</label>
                            <input type="date" name="tanggal_akhir" class="form-control form-control-sm" value="{{ request('tanggal_akhir') }}">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-3 mr-1">
                                <i class="fas fa-filter mr-1"></i> Filter
                            </button>
                            <a href="{{ route('user.pencatatan.index') }}" class="btn btn-light btn-sm border font-weight-bold">
                                Reset
                            </a>
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
                            <th>Tanggal</th>
                            <th>Jenis Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Biaya</th>
                            <th>Jenis Ikan</th>
                            <th>Kolam</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pencatatan as $item)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">{{ $loop->iteration + ($pencatatan->currentPage() - 1) * $pencatatan->perPage() }}</td>
                            <td class="font-weight-bold text-dark small">{{ $item->tanggal->format('d M Y') }}</td>
                            <td>
                                <span class="badge badge-primary px-3 py-1">{{ $item->jenis_kegiatan }}</span>
                            </td>
                            <td class="text-muted small">{{ Str::limit($item->keterangan, 45) ?? '-' }}</td>
                            <td class="font-weight-bold text-dark small">Rp {{ number_format($item->biaya, 0, ',', '.') }}</td>
                            <td>
                                @if($item->jenis_ikan)
                                    <span class="badge badge-info px-2 py-1">{{ $item->jenis_ikan }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($item->kolam)
                                    <span class="badge badge-secondary px-2 py-1">{{ $item->kolam }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.pencatatan.show', $item->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1">Detail</a>
                                <a href="{{ route('user.pencatatan.edit', $item->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1">Edit</a>
                                <form action="{{ route('user.pencatatan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger border font-weight-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="icon-square bg-primary-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada data pencatatan aktivitas</p>
                                <small class="text-muted">Klik tombol "Tambah Pencatatan" untuk menambahkan log aktivitas baru.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="small text-muted">
                    Menampilkan {{ $pencatatan->firstItem() ?? 0 }} - {{ $pencatatan->lastItem() ?? 0 }} dari {{ $pencatatan->total() }} data
                </div>
                <div>{{ $pencatatan->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection