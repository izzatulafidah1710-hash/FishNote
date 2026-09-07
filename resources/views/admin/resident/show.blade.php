@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-tag me-2 text-primary"></i>Detail Peternak</h1>
        <a href="{{ route('admin.datapeternak.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Profil: {{ $resident->name }}</h6>
            <a href="{{ route('admin.datapeternak.edit', $resident->id) }}" class="btn btn-sm btn-info">
                <i class="fas fa-edit me-1"></i> Edit Peternak
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Nama Lengkap</label>
                    <h5 class="font-weight-bold text-dark">{{ $resident->name }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Email</label>
                    <h5 class="font-weight-bold text-dark">{{ $resident->email }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Nomor Telepon/WA</label>
                    <h5 class="font-weight-bold text-dark">{{ $resident->phone ?? '-' }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Status Akun</label>
                    @if($resident->status === 'aktif')
                        <span class="badge bg-success text-white px-3 py-2">Aktif</span>
                    @else
                        <span class="badge bg-danger text-white px-3 py-2">Nonaktif</span>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Lokasi Tambak/Kolam</label>
                    <h5 class="font-weight-bold text-dark">{{ $resident->farm_location ?? '-' }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted d-block">Jenis Usaha</label>
                    <h5 class="font-weight-bold text-dark">{{ $resident->jenis_usaha ?? '-' }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="text-muted d-block">Alamat Lengkap</label>
                    <p class="text-dark">{{ $resident->address ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
