@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Tambah Data Peternak</h3>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah Peternak --}}
    <form action="{{ url('/resident/store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="contoh@email.com" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="08123456789" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Status Akun</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" id="address" class="form-control" rows="2" placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="farm_location" class="form-label">Lokasi Tambak / Kolam</label>
            <input type="text" name="farm_location" id="farm_location" class="form-control" placeholder="Contoh: Desa Sungai Alam, Kec. Bengkalis" value="{{ old('farm_location') }}">
        </div>

        <div class="mb-3">
            <label for="profile_photo" class="form-label">Foto Profil</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control" accept="image/*">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url('/resident') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
