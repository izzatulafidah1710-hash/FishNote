@extends('layouts.app')

@section('title', 'Tambah Info Akun')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="card border-0 shadow-sm rounded-lg">
        <div class="card-header bg-white py-3 px-4 border-bottom">
            <h6 class="font-weight-bold text-dark m-0">Tambah Info Akun</h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.infoakun.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Nama Peternak</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Avatar</label>
                    <input type="file" name="avatar" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.infoakun.index') }}" class="btn btn-light border">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
