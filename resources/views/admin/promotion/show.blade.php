@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-eye me-2 text-success"></i>Detail Promosi</h1>
        <a href="{{ route('admin.datapromosi.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-success">{{ $promotion->judul_promosi }}</h6>
            <a href="{{ route('admin.datapromosi.edit', $promotion->id) }}" class="btn btn-sm btn-success">
                <i class="fas fa-edit me-1"></i> Edit Promosi
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                @if($promotion->foto)
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('storage/' . $promotion->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $promotion->judul_promosi }}">
                    </div>
                @endif

                <div class="{{ $promotion->foto ? 'col-md-8' : 'col-md-12' }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Peternak</label>
                            <h5 class="font-weight-bold text-dark">{{ $promotion->resident->name ?? ($promotion->user->name ?? 'N/A') }}</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Jenis Ikan</label>
                            <h5 class="font-weight-bold text-dark">{{ $promotion->jenis_ikan }}</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Harga</label>
                            <h5 class="font-weight-bold text-success">Rp {{ number_format($promotion->harga, 0, ',', '.') }} / {{ $promotion->satuan }}</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Stok Tersedia</label>
                            <h5 class="font-weight-bold text-dark">{{ number_format($promotion->stok_tersedia) }} {{ $promotion->satuan }}</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Status Promosi</label>
                            @if($promotion->status === 'Aktif')
                                <span class="badge bg-success text-white px-3 py-2">Aktif</span>
                            @elseif($promotion->status === 'Habis')
                                <span class="badge bg-warning text-dark px-3 py-2">Habis</span>
                            @else
                                <span class="badge bg-secondary text-white px-3 py-2">Tidak Aktif</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block">Dilihat</label>
                            <h5 class="font-weight-bold text-dark">{{ number_format($promotion->views) }} kali</h5>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-muted d-block">Deskripsi</label>
                            <p class="text-dark">{{ $promotion->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
