@extends('userlayouts.app')

@section('title', 'Edit Pencatatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pencatatan</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.pencatatan.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('user.pencatatan.update', $pencatatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <!-- Informasi Umum -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $pencatatan->tanggal->format('Y-m-d')) }}" required>
                                    @error('tanggal')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_ikan">Jenis Ikan <span class="text-danger">*</span></label>
                                    <select name="jenis_ikan" id="jenis_ikan" class="form-control @error('jenis_ikan') is-invalid @enderror" required>
                                        <option value="">Pilih Jenis Ikan</option>
                                        <option value="Lele" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Lele' ? 'selected' : '' }}>Lele</option>
                                        <option value="Nila" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Nila' ? 'selected' : '' }}>Nila</option>
                                        <option value="Gurame" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                                        <option value="Mas" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Mas' ? 'selected' : '' }}>Mas</option>
                                        <option value="Patin" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Patin' ? 'selected' : '' }}>Patin</option>
                                        <option value="Mujair" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Mujair' ? 'selected' : '' }}>Mujair</option>
                                        <option value="Lainnya" {{ old('jenis_ikan', $pencatatan->jenis_ikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                    <input type="text" name="kolam" id="kolam" class="form-control @error('kolam') is-invalid @enderror" value="{{ old('kolam', $pencatatan->kolam) }}" placeholder="Contoh: Kolam 1, Kolam A" required>
                                    @error('kolam')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                                    <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control @error('jenis_kegiatan') is-invalid @enderror" required>
                                        <option value="">Pilih Jenis Kegiatan</option>
                                        <option value="Pemberian Pakan" {{ old('jenis_kegiatan', $pencatatan->jenis_kegiatan) == 'Pemberian Pakan' ? 'selected' : '' }}>Pemberian Pakan</option>
                                        <option value="Pengecekan Air" {{ old('jenis_kegiatan', $pencatatan->jenis_kegiatan) == 'Pengecekan Air' ? 'selected' : '' }}>Pengecekan Air</option>
                                        <option value="Panen" {{ old('jenis_kegiatan', $pencatatan->jenis_kegiatan) == 'Panen' ? 'selected' : '' }}>Panen</option>
                                        <option value="Perawatan" {{ old('jenis_kegiatan', $pencatatan->jenis_kegiatan) == 'Perawatan' ? 'selected' : '' }}>Perawatan</option>
                                        <option value="Lainnya" {{ old('jenis_kegiatan', $pencatatan->jenis_kegiatan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_kegiatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $pencatatan->keterangan) }}</textarea>
                            @error('keterangan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Data Pakan -->
                        <h5 class="mt-4">Data Pakan & Ikan</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_pakan">Jumlah Pakan (Kg)</label>
                                    <input type="number" step="0.01" name="jumlah_pakan" id="jumlah_pakan" class="form-control @error('jumlah_pakan') is-invalid @enderror" value="{{ old('jumlah_pakan', $pencatatan->jumlah_pakan) }}">
                                    @error('jumlah_pakan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="berat_ikan">Berat Ikan (Kg)</label>
                                    <input type="number" step="0.01" name="berat_ikan" id="berat_ikan" class="form-control @error('berat_ikan') is-invalid @enderror" value="{{ old('berat_ikan', $pencatatan->berat_ikan) }}">
                                    @error('berat_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_ikan">Jumlah Ikan (Ekor)</label>
                                    <input type="number" name="jumlah_ikan" id="jumlah_ikan" class="form-control @error('jumlah_ikan') is-invalid @enderror" value="{{ old('jumlah_ikan', $pencatatan->jumlah_ikan) }}">
                                    @error('jumlah_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Kualitas Air -->
                        <h5 class="mt-4">Data Kualitas Air</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="suhu_air">Suhu Air (°C)</label>
                                    <input type="number" step="0.01" name="suhu_air" id="suhu_air" class="form-control @error('suhu_air') is-invalid @enderror" value="{{ old('suhu_air', $pencatatan->suhu_air) }}">
                                    @error('suhu_air')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ph_air">pH Air</label>
                                    <input type="number" step="0.01" name="ph_air" id="ph_air" class="form-control @error('ph_air') is-invalid @enderror" value="{{ old('ph_air', $pencatatan->ph_air) }}" min="0" max="14">
                                    @error('ph_air')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="oksigen">Oksigen (mg/L)</label>
                                    <input type="number" step="0.01" name="oksigen" id="oksigen" class="form-control @error('oksigen') is-invalid @enderror" value="{{ old('oksigen', $pencatatan->oksigen) }}">
                                    @error('oksigen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Lainnya -->
                        <h5 class="mt-4">Informasi Tambahan</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisi_ikan">Kondisi Ikan</label>
                                    <select name="kondisi_ikan" id="kondisi_ikan" class="form-control @error('kondisi_ikan') is-invalid @enderror">
                                        <option value="">Pilih Kondisi</option>
                                        <option value="Sehat" {{ old('kondisi_ikan', $pencatatan->kondisi_ikan) == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                                        <option value="Sakit" {{ old('kondisi_ikan', $pencatatan->kondisi_ikan) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="Mati" {{ old('kondisi_ikan', $pencatatan->kondisi_ikan) == 'Mati' ? 'selected' : '' }}>Mati</option>
                                    </select>
                                    @error('kondisi_ikan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="biaya">Biaya Operasional (Rp)</label>
                                    <input type="number" step="0.01" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya', $pencatatan->biaya) }}">
                                    @error('biaya')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Dokumentasi</label>
                            @if($pencatatan->foto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $pencatatan->foto) }}" alt="Foto Pencatatan" class="img-thumbnail" width="200">
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
                        <a href="{{ route('user.pencatatan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection