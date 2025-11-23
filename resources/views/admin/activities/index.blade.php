@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Aktivitas Peternak</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Aktivitas</h6>
        </div>
        <div class="card-body">

            @if($activities->count() == 0)
                <div class="alert alert-info text-center">
                    Belum ada aktivitas.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>ID Peternak</th>
                                <th>Jenis Aktivitas</th>
                                <th>Deskripsi</th>
                                <th>Modul Terkait</th>
                                <th>ID Data</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->peternak_id ?? '-' }}</td>
                                    <td>{{ $activity->activity_type }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>{{ $activity->related_module ?? '-' }}</td>
                                    <td>{{ $activity->related_id ?? '-' }}</td>
                                    <td>{{ $activity->created_at->format('d-m-Y H:i') }}</td>

                                    <td>
                                        <form action="{{ route('aktivitas.delete', $activity->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus aktivitas ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @endif

        </div>
    </div>

</div>

@endsection
