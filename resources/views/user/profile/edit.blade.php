@extends('userlayouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Vizora Top Header Bar -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Edit Profile</h4>
            <p class="text-muted small mb-0">Perbarui informasi profil dan kata sandi akun Anda</p>
        </div>
        <a href="{{ route('user.profile') }}" class="btn btn-light border font-weight-bold px-3 py-2 shadow-sm rounded-lg text-dark" style="font-size: 0.85rem;">
            <i class="fas fa-arrow-left mr-1.5"></i> Kembali ke Profile
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        <i class="fas fa-exclamation-triangle mr-2 text-danger"></i> <strong>Terjadi Kesalahan!</strong>
        <ul class="mb-0 mt-2 pl-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Profile Info Section (Left Column) -->
        <div class="col-lg-4 mb-4">
            <!-- Avatar Card -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-body text-center p-4">
                    <img class="img-profile rounded-circle shadow-sm mb-3" 
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff&size=200" 
                         alt="{{ Auth::user()->name }}"
                         style="width: 120px; height: 120px; border: 4px solid #dbeafe; object-fit: cover;">
                    <h5 class="font-weight-bold text-dark mb-1">{{ Auth::user()->name }}</h5>
                    <span class="badge badge-light border text-primary font-weight-bold px-3 py-1" style="font-size: 0.78rem;">
                        <i class="fas fa-user-tag mr-1"></i> Peternak
                    </span>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">
                        <i class="fas fa-lock text-warning mr-2"></i>Ubah Password
                    </h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="current_password" class="font-weight-bold text-dark small">
                                Password Lama <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0">
                                        <i class="fas fa-key text-muted"></i>
                                    </span>
                                </div>
                                <input type="password" 
                                       class="form-control bg-light @error('current_password') is-invalid @enderror" 
                                       id="current_password" 
                                       name="current_password" 
                                       placeholder="Masukkan password lama"
                                       required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="font-weight-bold text-dark small">
                                Password Baru <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input type="password" 
                                       class="form-control bg-light @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password"
                                       placeholder="Minimal 6 karakter" 
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i> Minimal 6 karakter
                            </small>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold text-dark small">
                                Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0">
                                        <i class="fas fa-check-double text-muted"></i>
                                    </span>
                                </div>
                                <input type="password" 
                                       class="form-control bg-light" 
                                       id="password_confirmation" 
                                       name="password_confirmation"
                                       placeholder="Ulangi password baru" 
                                       required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning btn-block font-weight-bold text-white shadow-sm rounded-lg py-2">
                            <i class="fas fa-key mr-1.5"></i> Ubah Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Profile Form (Right Column) -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">
                        <i class="fas fa-user-edit text-primary mr-2"></i>Informasi Profile
                    </h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="font-weight-bold text-dark small">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0">
                                                <i class="fas fa-user text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" 
                                               class="form-control bg-light @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $resident->name) }}"
                                               placeholder="Nama lengkap Anda" 
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="font-weight-bold text-dark small">
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="email" 
                                               class="form-control bg-light @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email', $resident->email) }}"
                                               placeholder="email@example.com" 
                                               required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phone" class="font-weight-bold text-dark small">
                                        No. Telepon
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0">
                                                <i class="fas fa-phone text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" 
                                               class="form-control bg-light @error('phone') is-invalid @enderror" 
                                               id="phone" 
                                               name="phone" 
                                               value="{{ old('phone', $resident->phone) }}" 
                                               placeholder="08xx-xxxx-xxxx">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="farm_location" class="font-weight-bold text-dark small">
                                        Lokasi Budidaya
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0">
                                                <i class="fas fa-water text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" 
                                               class="form-control bg-light @error('farm_location') is-invalid @enderror" 
                                               id="farm_location" 
                                               name="farm_location" 
                                               value="{{ old('farm_location', $resident->farm_location) }}" 
                                               placeholder="Lokasi kolam/tambak">
                                        @error('farm_location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="address" class="font-weight-bold text-dark small">
                                Alamat Lengkap
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0">
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                    </span>
                                </div>
                                <textarea class="form-control bg-light @error('address') is-invalid @enderror" 
                                          id="address" 
                                          name="address" 
                                          rows="3" 
                                          placeholder="Masukkan alamat lengkap Anda">{{ old('address', $resident->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-asterisk text-danger mr-1"></i> Field bertanda bintang wajib diisi
                            </small>
                            <div>
                                <a href="{{ route('user.profile') }}" class="btn btn-light border font-weight-bold rounded-lg px-3 mr-2">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary font-weight-bold shadow-sm rounded-lg px-4">
                                    <i class="fas fa-save mr-1.5"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection