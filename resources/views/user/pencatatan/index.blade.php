@extends('userlayouts.app')

@section('title', 'Pencatatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Pencatatan</h3>
                    <a href="{{ route('user.pencatatan.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Pencatatan
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
                    <form method="GET" action="{{ route('user.pencatatan.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="jenis_kegiatan" class="form-control">
                                    <option value="">Semua Kegiatan</option>
                                    <option value="Pemberian Pakan" {{ request('jenis_kegiatan') == 'Pemberian Pakan' ? 'selected' : '' }}>Pemberian Pakan</option>
                                    <option value="Pengecekan Air" {{ request('jenis_kegiatan') == 'Pengecekan Air' ? 'selected' : '' }}>Pengecekan Air</option>
                                    <option value="Panen" {{ request('jenis_kegiatan') == 'Panen' ? 'selected' : '' }}>Panen</option>
                                    <option value="Perawatan" {{ request('jenis_kegiatan') == 'Perawatan' ? 'selected' : '' }}>Perawatan</option>
                                    <option value="Lainnya" {{ request('jenis_kegiatan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}" placeholder="Tanggal Mulai">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}" placeholder="Tanggal Akhir">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="{{ route('user.pencatatan.index') }}" class="btn btn-secondary">
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
                                    <th>Jenis Kegiatan</th>
                                    <th>Keterangan</th>
                                    <th>Biaya</th>
                                    <th>Jenis Ikan</th>
                                    <th>Kolam</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pencatatan as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($pencatatan->currentPage() - 1) * $pencatatan->perPage() }}</td>
                                    <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->jenis_kegiatan }}</span>
                                    </td>
                                    <td>{{ Str::limit($item->keterangan, 50) }}</td>
                                    <td>Rp {{ number_format($item->biaya, 0, ',', '.') }}</td>
                                    <td>{{ $item->jenis_ikan ?? '-' }}</td>
                                    <td>{{ $item->kolam ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('user.pencatatan.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.pencatatan.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('user.pencatatan.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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
                                    <td colspan="8" class="text-center">Tidak ada data pencatatan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $pencatatan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection