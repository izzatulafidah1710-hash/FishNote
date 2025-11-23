@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peternak</h1>
        <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </a>
    </div>

    {{-- table --}}
    <div class="container-fluid mt-4">
        <h5 class="mb-3">Daftar Peternak</h5>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($residents as $index => $resident)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $resident->name }}</td>
                        <td>{{ $resident->email }}</td>
                        <td>{{ $resident->phone }}</td>
                        <td>{{ $resident->address }}</td>
                        <td>
                            <span class="badge {{ $resident->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($resident->status) }}
                            </span>
                        </td>
                        <td>{{ $resident->last_login ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/resident/' . $resident->id . '/edit') }}" class="mr-3 btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ url('/resident/' . $resident->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                        <td colspan="8" class="text-center text-muted">Belum ada data peternak</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
