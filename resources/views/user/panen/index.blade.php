@extends('userlayouts.app')

@section('title', 'Data Panen')

@section('content')
<div class="container-fluid">
    <!-- Statistik Cards -->
    <div class="row mb-3">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPanen }}</h3>
                    <p>Total Panen</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fish"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalBerat, 2) }} <small>Kg</small></h3>
                    <p>Total Berat</p>
                </div>
                <div class="icon">
                    <i class="fas fa-weight"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                    <p>Total Pendapatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Panen</h3>
                    <a href="{{ route('user.panen.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Data Panen
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
                    <form method="GET" action="{{ route('user.panen.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="jenis_ikan" class="form-control">
                                    <option value="">Semua Jenis Ikan</option>
                                    <option value="Lele" {{ request('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                                    <option value="Nila" {{ request('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                                    <option value="Gurame" {{ request('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                    <option value="Mas" {{ request('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                                    <option value="Patin" {{ request('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="status" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="Sudah Terjual" {{ request('status') == 'Sudah Terjual' ? 'selected' : '' }}>Sudah Terjual</option>
                                    <option value="Belum Terjual" {{ request('status') == 'Belum Terjual' ? 'selected' : '' }}>Belum Terjual</option>
                                    <option value="Sebagian Terjual" {{ request('status') == 'Sebagian Terjual' ? 'selected' : '' }}>Sebagian Terjual</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}" placeholder="Tanggal Mulai">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}" placeholder="Tanggal Akhir">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="{{ route('user.panen.index') }}" class="btn btn-secondary">
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
                                    <th>Tanggal</th>
                                    <th>Jenis Ikan</th>
                                    <th>Kolam</th>
                                    <th>Jumlah</th>
                                    <th>Berat Total</th>
                                    <th>Pendapatan</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPanen as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($dataPanen->currentPage() - 1) * $dataPanen->perPage() }}</td>
                                    <td>{{ $item->tanggal_panen->format('d/m/Y') }}</td>
                                    <td><span class="badge badge-success">{{ $item->jenis_ikan }}</span></td>
                                    <td><span class="badge badge-secondary">{{ $item->kolam }}</span></td>
                                    <td>{{ number_format($item->jumlah_ikan) }} ekor</td>
                                    <td>{{ number_format($item->berat_total, 2) }} Kg</td>
                                    <td class="text-success font-weight-bold">Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->status_badge }}">{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.panen.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.panen.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('user.panen.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data panen</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $dataPanen->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection