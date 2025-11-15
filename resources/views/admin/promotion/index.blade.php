@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Promosi</h1>

    <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">
        + Tambah Promosi
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($promotions as $promotion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $promotion->judul }}</td>
                                <td>{{ Str::limit($promotion->deskripsi, 50) }}</td>
                                <td>Rp {{ number_format($promotion->harga, 0, ',', '.') }}</td>
                                <td>{{ $promotion->stok }}</td>

                                <td>
                                    @if ($promotion->gambar)
                                        <img src="{{ asset('storage/' . $promotion->gambar) }}" width="80">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('promotions.edit', $promotion->id) }}"
                                       class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('promotions.destroy', $promotion->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
