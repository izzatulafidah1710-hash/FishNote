@extends('userlayouts.app')

@section('title', 'Promosi')

@section('content')
<div class="container-fluid">
    <!-- Statistik Cards -->
    <div class="row mb-3">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPromosi }}</h3>
                    <p>Total Promosi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $promosiAktif }}</h3>
                    <p>Promosi Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ number_format($totalViews) }}</h3>
                    <p>Total Dilihat</p>
                </div>
                <div class="icon">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Promosi</h3>
                    <a href="{{ route('user.promosi.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Promosi
                    </a>
                </div>
                <div class="card-body">
                    <!-- Alert Success -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <!-- Filter -->
                    <form method="GET" action="{{ route('user.promosi.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="jenis_ikan" class="form-control">
                                    <option value="">Semua Jenis Ikan</option>
                                    <option value="Lele" {{ request('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                                    <option value="Nila" {{ request('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                                    <option value="Gurame" {{ request('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                    <option value="Mas" {{ request('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                                    <option value="Patin" {{ request('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="status" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    <option value="Habis" {{ request('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="{{ route('user.promosi.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Jenis Ikan</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($promosi as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($promosi->currentPage() - 1) * $promosi->perPage() }}</td>
                                    <td>{{ $item->judul_promosi }}</td>
                                    <td><span class="badge badge-success">{{ $item->jenis_ikan }}</span></td>
                                    <td class="font-weight-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}/{{ $item->satuan }}</td>
                                    <td>{{ number_format($item->stok_tersedia) }} {{ $item->satuan }}</td>
                                    <td>
                                        <small>{{ $item->tanggal_mulai->format('d/m/Y') }} - {{ $item->tanggal_berakhir->format('d/m/Y') }}</small>
                                        @if($item->sisa_hari > 0)
                                        <br><span class="badge badge-info">{{ $item->sisa_hari }} hari lagi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $item->status_badge }}">{{ $item->status }}</span>
                                    </td>
                                    <td><i class="fas fa-eye"></i> {{ number_format($item->views) }}</td>
                                    <td>
                                        <a href="{{ route('user.promosi.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.promosi.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('user.promosi.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus promosi ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data promosi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $promosi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection