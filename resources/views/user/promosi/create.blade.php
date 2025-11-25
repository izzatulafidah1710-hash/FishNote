@extends('userlayouts.app')

@section('title', 'Tambah Promosi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Promosi Baru</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.promosi.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('user.promosi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Informasi Produk -->
                        <h5 class="text-primary">Informasi Produk</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_promosi">Judul Promosi <span class="text-danger">*</span></label>
                                    <input type="text" name="judul_promosi" id="judul_promosi" class="form-control @error('judul_promosi') is-invalid @enderror" value="{{ old('judul_promosi') }}" placeholder="Contoh: Ikan Lele Segar Siap Panen" required>
                                    @error('judul_promosi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_ikan">Jenis Ikan <span class="text-danger">*</span></label>
                                    <select name="jenis_ikan" id="jenis_ikan" class="form-control @error('jenis_ikan') is-invalid @enderror" required>
                                        <option value="">Pilih Jenis Ikan</option>
                                        <option value="Lele" {{ old('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                                        <option value="Nila" {{ old('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                                        <option value="Gurame" {{ old('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                        <option value="Mas" {{ old('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                                        <option value="Patin" {{ old('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                                        <option value="Mujair" {{ old('jenis_ikan') == 'Mujair' ? 'selected' : '' }}>Mujair</option>
                                        <option value="Lainnya" {{ old('jenis_ikan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan detail produk, kualitas, ukuran, dll..." required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Harga & Stok -->
                        <h5 class="text-primary mt-4">Harga & Stok</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="harga">Harga <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="50000" required min="0">
                                    @error('harga')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="satuan">Satuan <span class="text-danger">*</span></label>
                                    <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" required>
                                        <option value="Kg" {{ old('satuan') == 'Kg' ? 'selected' : '' }}>Per Kg</option>
                                        <option value="Ekor" {{ old('satuan') == 'Ekor' ? 'selected' : '' }}>Per Ekor</option>
                                    </select>
                                    @error('satuan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stok_tersedia">Stok Tersedia <span class="text-danger">*</span></label>
                                    <input type="number" name="stok_tersedia" id="stok_tersedia" class="form-control @error('stok_tersedia') is-invalid @enderror" value="{{ old('stok_tersedia') }}" placeholder="100" required min="1">
                                    @error('stok_tersedia')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Kontak & Lokasi -->
                        <h5 class="text-primary mt-4">Kontak & Lokasi</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak">Nomor Kontak (WhatsApp) <span class="text-danger">*</span></label>
                                    <input type="text" name="kontak" id="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}" placeholder="08**********" required>
                                    <small class="form-text text-muted">Format: 08xxxxxxxxxx</small>
                                    @error('kontak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" placeholder="Contoh: Bengkalis, Kepulauan Riau">
                                    @error('lokasi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Periode Promosi -->
                        <h5 class="text-primary mt-4">Periode Promosi</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', date('Y-m-d')) }}" required>
                                    @error('tanggal_mulai')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_berakhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control @error('tanggal_berakhir') is-invalid @enderror" value="{{ old('tanggal_berakhir') }}" required>
                                    @error('tanggal_berakhir')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="Habis" {{ old('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Foto Produk -->
                        <h5 class="text-primary mt-4">Foto Produk</h5>
                        <hr>
                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Foto yang menarik akan meningkatkan minat pembeli.</small>
                            @error('foto')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> <strong>Tips:</strong> 
                            <ul class="mb-0 mt-2">
                                <li>Gunakan judul yang menarik dan jelas</li>
                                <li>Berikan deskripsi detail tentang kualitas ikan</li>
                                <li>Pastikan harga kompetitif</li>
                                <li>Upload foto produk yang berkualitas</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Promosi
                        </button>
                        <a href="{{ route('user.promosi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection