@extends('userlayouts.app')

@section('title', 'Riwayat Activity Log')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Riwayat Activity Log</h4>
            <p class="text-muted small mb-0">Pantau seluruh riwayat aktivitas pencatatan harian, hasil panen, dan promosi produk.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('user.riwayat.export') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-download mr-1"></i> Export Data Log
            </a>
        </div>
    </div>

    @if(session('info'))
    <div class="alert alert-info border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif

    {{-- Stat Cards (Vizora style) --}}
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Aktivitas</span>
                        <div class="icon-square bg-primary-light"><i class="fas fa-layer-group"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalAktivitas) }}</h3>
                        <span class="trend-badge-info">Log</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Semua aktivitas</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Pencatatan</span>
                        <div class="icon-square bg-info-light"><i class="fas fa-clipboard-list"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPencatatan) }}</h3>
                        <span class="trend-badge-info">Catatan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Aktivitas budidaya</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Hasil Panen</span>
                        <div class="icon-square bg-success-light"><i class="fas fa-fish"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPanen) }}</h3>
                        <span class="trend-badge-success">Panen</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Data hasil panen</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Promosi</span>
                        <div class="icon-square bg-warning-light"><i class="fas fa-bullhorn"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPromosi) }}</h3>
                        <span class="trend-badge-warning">Listing</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Promosi produk</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="card border-0 shadow-sm rounded-lg mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Filter Riwayat</h6>
        </div>
        <div class="card-body p-4">
            <form method="GET" action="{{ route('user.riwayat.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Tipe Aktivitas</label>
                        <select name="tipe" class="form-control form-control-sm">
                            <option value="semua" {{ $tipe == 'semua' ? 'selected' : '' }}>Semua Aktivitas</option>
                            <option value="pencatatan" {{ $tipe == 'pencatatan' ? 'selected' : '' }}>Pencatatan</option>
                            <option value="panen" {{ $tipe == 'panen' ? 'selected' : '' }}>Data Panen</option>
                            <option value="promosi" {{ $tipe == 'promosi' ? 'selected' : '' }}>Promosi</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control form-control-sm" value="{{ $tanggalMulai }}">
                    </div>
                    <div class="col-md-3 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control form-control-sm" value="{{ $tanggalAkhir }}">
                    </div>
                    <div class="col-md-3 mb-2 mb-md-0">
                        <label class="small font-weight-bold text-dark mb-1">Keyword</label>
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari data..." value="{{ $search }}">
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-3 mr-2">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <a href="{{ route('user.riwayat.index') }}" class="btn btn-light btn-sm border font-weight-bold">Reset</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Riwayat List --}}
    <div class="card border-0 shadow-sm rounded-lg">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Aktivitas</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $totalAktivitas }} Aktivitas</span>
        </div>
        <div class="card-body p-4">
            @if($riwayat->count() > 0)
            <div>
                @foreach($riwayat as $item)
                <div class="card border-0 shadow-sm rounded-lg mb-3" style="border-left: 4px solid var(--{{ $item['color'] == 'primary' ? 'primary' : ($item['color'] == 'success' ? 'success' : ($item['color'] == 'info' ? 'info' : 'warning')) }}-color, #2563eb) !important;">
                    <div class="card-body p-3 p-lg-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-start" style="gap: 12px;">
                                <div class="icon-square bg-{{ $item['color'] == 'primary' ? 'primary' : ($item['color'] == 'success' ? 'success' : ($item['color'] == 'info' ? 'info' : 'warning')) }}-light flex-shrink-0">
                                    <i class="fas fa-{{ $item['color'] == 'success' ? 'fish' : ($item['color'] == 'info' ? 'bullhorn' : 'clipboard-check') }}"></i>
                                </div>
                                <div>
                                    <div class="mb-1">
                                        <span class="badge badge-{{ $item['color'] }} px-3 py-1">{{ $item['tipe_label'] }}</span>
                                    </div>
                                    <h6 class="font-weight-bold text-dark mb-1" style="font-size: 0.95rem;">{{ $item['judul'] }}</h6>
                                    <p class="text-muted small mb-0">{{ Str::limit($item['deskripsi'], 120) }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-shrink-0 ml-3">
                                <a href="{{ $item['route_show'] }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1">Detail</a>
                                <a href="{{ $item['route_edit'] }}" class="btn btn-sm btn-light text-warning border font-weight-bold">Edit</a>
                            </div>
                        </div>

                        <div class="bg-light rounded-lg p-3 mt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="small text-muted"><strong>Jenis Ikan:</strong> {{ $item['jenis_ikan'] }}</div>
                                    <div class="small text-muted"><strong>Kolam:</strong> {{ $item['kolam'] }}</div>
                                </div>
                                <div class="col-md-6">
                                    @foreach($item['detail'] as $key => $value)
                                    <div class="small text-muted"><strong>{{ $key }}:</strong> {{ $value }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center text-muted small mt-2">
                            <span><i class="fas fa-clock mr-1"></i> {{ $item['tanggal']->format('d M Y, H:i') }}</span>
                            <span>{{ $item['created_at']->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                <div class="icon-square bg-primary-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                    <i class="fas fa-history"></i>
                </div>
                <p class="mb-1 font-weight-bold text-dark">Tidak Ada Riwayat</p>
                <p class="text-muted small mb-4">Belum ada aktivitas yang tercatat atau tidak ada data yang cocok dengan filter.</p>
                <a href="{{ route('user.riwayat.index') }}" class="btn btn-primary font-weight-bold px-4">Reset Filter</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection