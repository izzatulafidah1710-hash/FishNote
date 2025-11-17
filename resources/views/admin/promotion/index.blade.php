@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Promosi</h1>
    <a href="{{ route('promotions.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

    <div class="container-fluid mt-4">
        <h5 class="mb-3">Daftar Promosi</h5>

    {{-- alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
        </table>
    </div>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th> 
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($promotions as $promotion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $promotion->judul }}</td>

                                <td>{{ Str::limit($promotion->deskripsi, 50) }}</td>

                                <td>Rp {{ number_format($promotion->harga, 0, ',', '.') }}</td>
                                <td>{{ $promotion->stok }}</td>

                                <td>
                                    @if ($promotion->gambar)
                                        <img src="{{ asset('storage/' . $promotion->gambar) }}" width="60" class="rounded">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        {{-- edit --}}
                                        <a href="{{ route('promotions.edit', $promotion->id) }}" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        {{-- delete --}}
                                        <form action="{{ route('promotions.destroy', $promotion->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada data promosi
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection
