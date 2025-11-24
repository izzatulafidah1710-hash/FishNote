@extends('userlayouts.app')

@section('title', 'Edit Promosi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Promosi</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.promosi.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('user.promosi.update', $promosi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <!-- Informasi Produk -->
                        <h5 class="text-primary">Informasi Produk</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_promosi">Judul Promosi <span class="text-danger">*</span></label>
                                    <input type="text" name="judul_promosi" id="judul_promosi" class="form-control @error('judul_promosi') is-invalid @enderror" value="{{ old('judul_promosi', $promosi->judul_promosi) }}" required>
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
                                        <option value="Lele" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Lele' ? 'selected' : '' }}>Lele</option>
                                        <option value="Nila" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Nila' ? 'selected' : '' }}>Nila</option>
                                        <option value="Gurame" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                        <option value="Mas" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Mas' ? 'selected' : '' }}>Mas</option>
                                        <option value="Patin" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Patin' ? 'selected' : '' }}>Patin</option>
                                        <option value="Mujair" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Mujair' ? 'selected' : '' }}>Mujair</option>
                                        <option value="Lainnya" {{ old('jenis_ikan', $promosi->jenis_ikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $promosi->deskripsi) }}</textarea>
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
                                    <input type="number" step="0.01" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $promosi->harga) }}" required min="0">
                                    @error('harga')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="satuan">Satuan <span class="text-danger">*</span></label>
                                    <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" required>
                                        <option value="Kg" {{ old('satuan', $promosi->satuan) == 'Kg' ? 'selected' : '' }}>Per Kg</option>
                                        <option value="Ekor" {{ old('satuan', $promosi->satuan) == 'Ekor' ? 'selected' : '' }}>Per Ekor</option>
                                    </select>
                                    @error('satuan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stok_tersedia">Stok Tersedia <span class="text-danger">*</span></label>
                                    <input type="number" name="stok_tersedia" id="stok_tersedia" class="form-control @error('stok_tersedia') is-invalid @enderror" value="{{ old('stok_tersedia', $promosi->stok_tersedia) }}" required min="0">
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
                                    <input type="text" name="kontak" id="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak', $promosi->kontak) }}" required>
                                    @error('kontak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $promosi->lokasi) }}">
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
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $promosi->tanggal_mulai->format('Y-m-d')) }}" required>
                                    @error('tanggal_mulai')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_berakhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control @error('tanggal_berakhir') is-invalid @enderror" value="{{ old('tanggal_berakhir', $promosi->tanggal_berakhir->format('Y-m-d')) }}" required>
                                    @error('tanggal_berakhir')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="Aktif" {{ old('status', $promosi->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ old('status', $promosi->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="Habis" {{ old('status', $promosi->status) == 'Habis' ? 'selected' : '' }}>Habis</option>
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
                        @if($promosi->foto)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                 alt="Foto Promosi" 
                                 class="img-thumbnail" 
                                 width="200"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/200x150?text=Foto+Error';">
                            <p class="text-muted small">Foto saat ini</p>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="foto">Upload Foto Baru</label>
                            <input type="file" name="foto" id="foto" class="form-control-file @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                            @error('foto')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-chart-line"></i> <strong>Statistik:</strong> Promosi ini sudah dilihat {{ number_format($promosi->views) }} kali
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Promosi
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