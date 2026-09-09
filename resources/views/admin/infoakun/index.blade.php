@extends('layouts.app')

@section('title', 'Info Akun Peternak')

@section('content')
<div class="container-fluid px-4 py-3">

    {{-- Page Header (Vizora Style) --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Info Akun Peternak</h4>
            <p class="text-muted small mb-0">Kelola informasi akun, hak akses, dan status login pengguna sistem.</p>
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
            <a href="{{ route('admin.infoakun.create') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
                <i class="fas fa-user-plus mr-1"></i> Tambah Akun Baru
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        <i class="fas fa-check-circle mr-2 text-success"></i>
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    {{-- DataTable Card --}}
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Daftar Akun Peternak</h6>
            <span class="badge badge-secondary px-3 py-1">{{ count($data) }} Akun</span>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="8%" class="text-center">Avatar</th>
                            <th>Nama Peternak</th>
                            <th>No. Telepon</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Login Terakhir</th>
                            <th width="12%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                        <tr>
                            <td class="text-center font-weight-bold text-muted small">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                @if($row->avatar)
                                    <img src="/storage/{{ $row->avatar }}" class="rounded-circle shadow-sm" style="width: 36px; height: 36px; object-fit: cover;">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($row->name) }}&background=1d4ed8&color=fff&size=36" class="rounded-circle shadow-sm" style="width: 36px; height: 36px;">
                                @endif
                            </td>
                            <td>
                                <div class="font-weight-bold text-dark" style="font-size: 0.875rem;">{{ $row->name }}</div>
                                @if(isset($row->email))
                                <small class="text-muted"><i class="fas fa-envelope mr-1"></i>{{ $row->email }}</small>
                                @endif
                            </td>
                            <td>
                                @if($row->phone)
                                <span class="small text-dark"><i class="fas fa-phone text-success mr-1"></i>{{ $row->phone }}</span>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge badge-info px-3 py-1">{{ $row->status ?? 'Aktif' }}</span>
                            </td>
                            <td class="text-center">
                                <small class="text-muted">{{ isset($row->last_login) ? \Carbon\Carbon::parse($row->last_login)->diffForHumans() : '-' }}</small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.infoakun.edit', $row->id) }}" class="btn btn-sm btn-light text-warning border font-weight-bold mr-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-light text-danger border font-weight-bold" onclick="confirmDelete({{ $row->id }}, '{{ $row->name }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $row->id }}" action="{{ route('admin.infoakun.destroy', $row->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="icon-square bg-primary-light mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <p class="mb-1 font-weight-bold text-dark">Belum ada data akun peternak</p>
                                <a href="{{ route('admin.infoakun.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="fas fa-plus mr-1"></i> Tambah Akun Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id, name) {
    Swal.fire({
        title: 'Hapus Info Akun?',
        text: 'Apakah Anda yakin ingin menghapus data akun "' + name + '"? Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endpush
@endsection