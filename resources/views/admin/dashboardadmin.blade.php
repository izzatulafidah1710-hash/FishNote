@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">

    <!-- Vizora Top Header Bar -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Dashboard Admin</h4>
            <p class="text-muted small mb-0">Selamat datang kembali, <strong class="text-dark">{{ Auth::user()->name }}</strong> 👋</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('landing') }}" class="btn btn-outline-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg mr-2" style="font-size: 0.85rem;">
                <i class="fas fa-home mr-1.5"></i> Ke Beranda
            </a>
            <div class="d-none d-sm-flex align-items-center mr-3">
                <span class="badge badge-pill badge-light border px-3 py-2 text-dark font-weight-bold mr-2">
                    <i class="fas fa-calendar-alt text-primary mr-1"></i> {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
                </span>
            </div>
            <a href="{{ route('admin.datapeternak.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-user-plus mr-1.5"></i> Tambah Peternak
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

    <!-- Metric Cards Grid (Vizora SaaS 4-Column Layout) -->
    <div class="row mb-4">
        <!-- Total Peternak -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('admin.datapeternak.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Total Peternak</span>
                            <div class="icon-square bg-primary-light">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPeternak) }}</h3>
                            <span class="trend-badge-success"><i class="fas fa-user-check mr-1"></i>{{ $peternakAktif }} Aktif</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Terdaftar di sistem</span>
                        <i class="fas fa-arrow-right text-primary"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Promosi Aktif -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('admin.datapromosi.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Promosi Tayang</span>
                            <div class="icon-square bg-success-light">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($promosiAktif) }}</h3>
                            <span class="trend-badge-info">Dari {{ $totalPromosi }} Listing</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Aktif di marketplace</span>
                        <i class="fas fa-arrow-right text-success"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Panen Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <a href="{{ route('admin.aktivitas.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Panen Bulan Ini</span>
                            <div class="icon-square bg-info-light">
                                <i class="fas fa-fish"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalBeratPanenBulanIni, 1) }} <small class="text-muted" style="font-size: 13px;">Kg</small></h3>
                            <span class="trend-badge-warning">{{ $totalPanenBulanIni }} Panen</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Total tonase bulan ini</span>
                        <i class="fas fa-arrow-right text-info"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Perputaran Nilai Panen -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.aktivitas.index') }}" class="text-decoration-none text-reset d-block h-100">
                <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-xs font-weight-bold text-muted text-uppercase">Nilai Hasil Panen</span>
                            <div class="icon-square bg-warning-light">
                                <i class="fas fa-coins"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.35rem;">
                                Rp {{ number_format($totalPendapatanPanenBulanIni, 0, ',', '.') }}
                            </h3>
                            <span class="trend-badge-success">Ekonomi</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                        <span>Total transaksi panen</span>
                        <i class="fas fa-arrow-right text-warning"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Data Tables & Lists (Vizora Split Layout) -->
    <div class="row">
        <!-- Tabel Peternak Terbaru (Col-6) -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Peternak Terbaru</h6>
                    <a href="{{ route('admin.datapeternak.index') }}" class="btn btn-light btn-sm font-weight-bold rounded-pill px-3">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive border-0">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th>Peternak</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peternakTerbaru as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=2563eb&color=fff&size=32" class="rounded-circle mr-2" style="width: 32px; height: 32px;">
                                            <div>
                                                <div class="font-weight-bold text-dark">{{ $item->name }}</div>
                                                <small class="text-muted">{{ $item->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="small text-muted">{{ $item->farm_location ?: 'Belum diisi' }}</td>
                                    <td>
                                        <span class="badge badge-success px-2.5 py-1">Aktif</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.datapeternak.show', $item->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada peternak terdaftar</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Promosi Terbaru (Col-6) -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">Promosi Terbaru</h6>
                    <a href="{{ route('admin.datapromosi.index') }}" class="btn btn-light btn-sm font-weight-bold rounded-pill px-3">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive border-0">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th>Promosi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($promosiTerbaru as $item)
                                <tr>
                                    <td>
                                        <div class="font-weight-bold text-dark">{{ Str::limit($item->judul_promosi, 35) }}</div>
                                        <small class="text-muted">{{ $item->jenis_ikan }}</small>
                                    </td>
                                    <td class="font-weight-bold text-success small">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if($item->status == 'Aktif')
                                            <span class="badge badge-success px-2.5 py-1">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary px-2.5 py-1">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.datapromosi.show', $item->id) }}" class="btn btn-sm btn-light text-info border font-weight-bold">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data promosi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
