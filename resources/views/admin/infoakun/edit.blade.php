@extends('layouts.app')

@section('title', 'Edit Info Akun')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="card border-0 shadow-sm rounded-lg">
        <div class="card-header bg-white py-3 px-4 border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Edit Info Akun</h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.infoakun.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Nama Peternak</label>
                    <input type="text" name="name" class="form-control" value="{{ $info->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ $info->phone }}">
                </div>
                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending" {{ $info->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="aktif" {{ $info->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $info->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Avatar (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="avatar" class="form-control-file">
                    @if($info->avatar)
                    <div class="mt-2">
                        <img src="/storage/{{ $info->avatar }}" alt="avatar" style="width: 50px; height: 50px; object-fit: cover;" class="rounded-circle shadow-sm">
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.infoakun.index') }}" class="btn btn-light border">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
