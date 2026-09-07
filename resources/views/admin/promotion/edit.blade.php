@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-edit me-2 text-success"></i>Edit Promosi (Admin)</h1>
        <a href="{{ route('admin.datapromosi.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Promosi: {{ $promotion->judul_promosi }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.datapromosi.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Pilih Peternak <span class="text-danger">*</span></label>
                        <select name="resident_id" class="form-select @error('resident_id') is-invalid @enderror" required>
                            @foreach($residents as $res)
                                <option value="{{ $res->id }}" {{ old('resident_id', $promotion->resident_id) == $res->id ? 'selected' : '' }}>
                                    {{ $res->name }} ({{ $res->farm_location ?? 'Tanpa Lokasi' }})
                                </option>
                            @endforeach
                        </select>
                        @error('resident_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Judul Promosi <span class="text-danger">*</span></label>
                        <input type="text" name="judul_promosi" class="form-control @error('judul_promosi') is-invalid @enderror" value="{{ old('judul_promosi', $promotion->judul_promosi) }}" required>
                        @error('judul_promosi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Jenis Ikan <span class="text-danger">*</span></label>
                        <input type="text" name="jenis_ikan" class="form-control @error('jenis_ikan') is-invalid @enderror" value="{{ old('jenis_ikan', $promotion->jenis_ikan) }}" required>
                        @error('jenis_ikan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold">Harga <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $promotion->harga) }}" min="0" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold">Satuan <span class="text-danger">*</span></label>
                        <select name="satuan" class="form-select @error('satuan') is-invalid @enderror" required>
                            <option value="Kg" {{ old('satuan', $promotion->satuan) == 'Kg' ? 'selected' : '' }}>Per Kg</option>
                            <option value="Ekor" {{ old('satuan', $promotion->satuan) == 'Ekor' ? 'selected' : '' }}>Per Ekor</option>
                        </select>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Stok Tersedia <span class="text-danger">*</span></label>
                        <input type="number" name="stok_tersedia" class="form-control @error('stok_tersedia') is-invalid @enderror" value="{{ old('stok_tersedia', $promotion->stok_tersedia) }}" min="0" required>
                        @error('stok_tersedia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Kontak HP/WA <span class="text-danger">*</span></label>
                        <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak', $promotion->kontak) }}" required>
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Status Promosi <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="Aktif" {{ old('status', $promotion->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ old('status', $promotion->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="Habis" {{ old('status', $promotion->status) == 'Habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($promotion->tanggal_mulai)->format('Y-m-d')) }}" required>
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Tanggal Berakhir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_berakhir" class="form-control @error('tanggal_berakhir') is-invalid @enderror" value="{{ old('tanggal_berakhir', \Carbon\Carbon::parse($promotion->tanggal_berakhir)->format('Y-m-d')) }}" required>
                        @error('tanggal_berakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label font-weight-bold">Foto Produk / Banner</label>
                        @if($promotion->foto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $promotion->foto) }}" alt="Foto Promosi" class="img-thumbnail" style="max-height: 120px;">
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label font-weight-bold">Deskripsi Promosi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $promotion->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-1"></i> Perbarui Promosi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
