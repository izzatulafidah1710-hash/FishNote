@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Info Akun Peternak</h1>
    <a href="{{ route('infoakun.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

<div class="container-fluid mt-4"> 

    <h5 class="mb-3">Daftar Akun</h5>

    <div class="table-responsive"> <!-- agar tabel tidak pecah -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Status</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Login Terakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->phone }}</td>
                    <td><span class="badge bg-info">{{ $row->status }}</span></td>
                    <td>
                        @if($row->avatar)
                            <img src="/storage/{{ $row->avatar }}" width="45" height="45" class="rounded-circle">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('infoakun.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('infoakun.destroy', $row->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection