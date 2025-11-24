@extends('userlayouts.app')

@section('title', 'Edit Data Panen')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Panen</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.panen.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('user.panen.update', $panen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <!-- Informasi Panen -->
                        <h5 class="text-primary">Informasi Panen</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_panen">Tanggal Panen <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_panen" id="tanggal_panen" class="form-control @error('tanggal_panen') is-invalid @enderror" value="{{ old('tanggal_panen', $panen->tanggal_panen->format('Y-m-d')) }}" required>
                                    @error('tanggal_panen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_ikan">Jenis Ikan <span class="text-danger">*</span></label>
                                    <select name="jenis_ikan" id="jenis_ikan" class="form-control @error('jenis_ikan') is-invalid @enderror" required>
                                        <option value="">Pilih Jenis Ikan</option>
                                        <option value="Lele" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Lele' ? 'selected' : '' }}>Lele</option>
                                        <option value="Nila" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Nila' ? 'selected' : '' }}>Nila</option>
                                        <option value="Gurame" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                        <option value="Mas" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Mas' ? 'selected' : '' }}>Mas</option>
                                        <option value="Patin" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Patin' ? 'selected' : '' }}>Patin</option>
                                        <option value="Mujair" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Mujair' ? 'selected' : '' }}>Mujair</option>
                                        <option value="Lainnya" {{ old('jenis_ikan', $panen->jenis_ikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kolam">Kolam <span class="text-danger">*</span></label>
                                    <input type="text" name="kolam" id="kolam" class="form-control @error('kolam') is-invalid @enderror" value="{{ old('kolam', $panen->kolam) }}" placeholder="Contoh: Kolam 1, Kolam A" required>
                                    @error('kolam')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status Penjualan <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Sudah Terjual" {{ old('status', $panen->status) == 'Sudah Terjual' ? 'selected' : '' }}>Sudah Terjual</option>
                                        <option value="Belum Terjual" {{ old('status', $panen->status) == 'Belum Terjual' ? 'selected' : '' }}>Belum Terjual</option>
                                        <option value="Sebagian Terjual" {{ old('status', $panen->status) == 'Sebagian Terjual' ? 'selected' : '' }}>Sebagian Terjual</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Kuantitas -->
                        <h5 class="text-primary mt-4">Data Kuantitas</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah_ikan">Jumlah Ikan (Ekor) <span class="text-danger">*</span></label>
                                    <input type="number" name="jumlah_ikan" id="jumlah_ikan" class="form-control @error('jumlah_ikan') is-invalid @enderror" value="{{ old('jumlah_ikan', $panen->jumlah_ikan) }}" required min="1">
                                    @error('jumlah_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="berat_total">Berat Total (Kg) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="berat_total" id="berat_total" class="form-control @error('berat_total') is-invalid @enderror" value="{{ old('berat_total', $panen->berat_total) }}" required min="0">
                                    @error('berat_total')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> <strong>Berat Rata-rata Saat Ini:</strong> {{ number_format($panen->berat_rata_rata, 2) }} Kg/ekor (akan diperbarui otomatis)
                        </div>

                        <!-- Data Harga -->
                        <h5 class="text-primary mt-4">Data Harga & Penjualan</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_per_kg">Harga Per Kg (Rp) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="harga_per_kg" id="harga_per_kg" class="form-control @error('harga_per_kg') is-invalid @enderror" value="{{ old('harga_per_kg', $panen->harga_per_kg) }}" required min="0">
                                    @error('harga_per_kg')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pembeli">Nama Pembeli</label>
                                    <input type="text" name="pembeli" id="pembeli" class="form-control @error('pembeli') is-invalid @enderror" value="{{ old('pembeli', $panen->pembeli) }}" placeholder="Nama pembeli atau distributor">
                                    @error('pembeli')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success">
                            <i class="fas fa-calculator"></i> <strong>Total Pendapatan Saat Ini:</strong> Rp {{ number_format($panen->total_pendapatan, 0, ',', '.') }} (akan diperbarui otomatis)
                        </div>

                        <!-- Keterangan & Foto -->
                        <h5 class="text-primary mt-4">Informasi Tambahan</h5>
                        <hr>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Catatan tambahan tentang panen ini...">{{ old('keterangan', $panen->keterangan) }}</textarea>
                            @error('keterangan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Panen</label>
                            @if($panen->foto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $panen->foto) }}" 
                                     alt="Foto Panen" 
                                     class="img-thumbnail" 
                                     width="200"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/200x150?text=Foto+Error';">
                                <p class="text-muted small">Foto saat ini</p>
                            </div>
                            @endif
                            <input type="file" name="foto" id="foto" class="form-control-file @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                            @error('foto')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('user.panen.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection