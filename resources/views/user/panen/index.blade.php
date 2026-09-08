@extends('userlayouts.app')

@section('title', 'Data Panen')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (same style as dashboard) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Data Hasil Panen</h4>
            <p class="text-muted small mb-0">Kelola data panen ikan, catat tonase, dan pantau statistik pendapatan budidaya Anda.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('user.panen.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-plus mr-1"></i> Tambah Data Panen
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

    {{-- Stat Cards (Vizora style) --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Frekuensi Panen</span>
                        <div class="icon-square bg-info-light">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalPanen) }}</h3>
                        <span class="trend-badge-info">Kali Panen</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total frekuensi panen</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3 mb-xl-0">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Tonase</span>
                        <div class="icon-square bg-success-light">
                            <i class="fas fa-fish"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.6rem;">{{ number_format($totalBerat, 2) }} <small class="text-muted" style="font-size: 13px;">Kg</small></h3>
                        <span class="trend-badge-success">Berat</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total berat seluruh panen</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-xs font-weight-bold text-muted text-uppercase">Total Hasil Penjualan</span>
                        <div class="icon-square bg-warning-light">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <h3 class="font-weight-bold text-dark mb-0 mr-2" style="font-size: 1.35rem;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                        <span class="trend-badge-warning">Pendapatan</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between pt-2 border-top text-muted small" style="font-size: 0.78rem;">
                    <span>Total estimasi penjualan panen</span>
                    <i class="fas fa-arrow-right text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Data Table Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Data Panen</h6>
            <span class="badge badge-secondary px-3 py-1">{{ $totalPanen }} Total</span>
        </div>

        <div class="card-body p-4">
            {{-- Filter Form --}}
            <div class="bg-light rounded-lg border p-3 mb-4">
                <form method="GET" action="{{ route('user.panen.index') }}">
                    <div class="row align-items-end">
                        <div class="col-md-3 mb-2 mb-md-0">
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
                        <div class="col-md-2 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Status</label>
                            <select name="status" class="form-control form-control-sm">
                                <option value="">Semua Status</option>
                                <option value="Sudah Terjual" {{ request('status') == 'Sudah Terjual' ? 'selected' : '' }}>Sudah Terjual</option>
                                <option value="Belum Terjual" {{ request('status') == 'Belum Terjual' ? 'selected' : '' }}>Belum Terjual</option>
                                <option value="Sebagian Terjual" {{ request('status') == 'Sebagian Terjual' ? 'selected' : '' }}>Sebagian Terjual</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Mulai Tgl</label>
                            <input type="date" name="tanggal_mulai" class="form-control form-control-sm" value="{{ request('tanggal_mulai') }}">
                        </div>
                        <div class="col-md-2 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-dark mb-1">Sampai Tgl</label>
                            <input type="date" name="tanggal_akhir" class="form-control form-control-sm" value="{{ request('tanggal_akhir') }}">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-3 mr-1">
                                <i class="fas fa-filter mr-1"></i> Filter
                            </button>
                            <a href="{{ route('user.panen.index') }}" class="btn btn-light btn-sm border font-weight-bold">Reset</a>
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
                            <th>Tanggal Panen</th>
                            <th>Jenis Ikan</th>
                            <th>Kolam</th>
                            <th>Jumlah</th>
                            <th>Berat Total</th>
                            <th>Pendapatan</th>
                            <th>Status</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataPanen as $item)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">{{ $loop->iteration + ($dataPanen->currentPage() - 1) * $dataPanen->perPage() }}</td>
                            <td class="font-weight-bold text-dark small">{{ $item->tanggal_panen->format('d M Y') }}</td>
                            <td><span class="badge badge-info px-3 py-1">{{ $item->jenis_ikan }}</span></td>
                            <td><span class="badge badge-secondary px-2 py-1">{{ $item->kolam }}</span></td>
                            <td class="small font-weight-bold">{{ number_format($item->jumlah_ikan) }} <small class="text-muted">ekor</small></td>
                            <td class="small font-weight-bold">{{ number_format($item->berat_total, 2) }} <small class="text-muted">Kg</small></td>
                            <td class="text-success font-weight-bold small">Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'Sudah Terjual')
                                    <span class="badge badge-success px-3 py-1">Sudah Terjual</span>
                                @elseif($item->status == 'Sebagian Terjual')
                                    <span class="badge badge-warning px-3 py-1">Sebagian Terjual</span>
                                @else
                                    <span class="badge badge-secondary px-3 py-1">Belum Terjual</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.panen.show', $item->id) }}" class="btn btn-sm btn-light text-primary border font-weight-bold mr-1">Detail</a>
                                <a href="{{ route('user.panen.edit', $item->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1">Edit</a>
                                <form action="{{ route('user.panen.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data panen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger border font-weight-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="icon-square bg-success-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-fish"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada data panen terdaftar</p>
                                <small class="text-muted">Klik tombol "Tambah Data Panen" untuk menambahkan catatan panen baru.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="small text-muted">
                    Menampilkan {{ $dataPanen->firstItem() ?? 0 }} - {{ $dataPanen->lastItem() ?? 0 }} dari {{ $dataPanen->total() }} data
                </div>
                <div>{{ $dataPanen->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection