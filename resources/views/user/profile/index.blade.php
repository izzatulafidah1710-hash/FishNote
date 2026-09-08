@extends('userlayouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Vizora Top Header Bar -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1" style="letter-spacing: -0.3px;">Profile Saya</h4>
            <p class="text-muted small mb-0">Kelola informasi akun dan statistik profil peternak Anda</p>
        </div>
        <a href="{{ route('user.profile.edit') }}" class="btn btn-primary font-weight-bold px-3 py-2 shadow-sm rounded-lg text-white" style="font-size: 0.85rem;">
            <i class="fas fa-edit mr-1.5"></i> Edit Profile
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-lg alert-dismissible fade show mb-4 py-3" role="alert">
        <i class="fas fa-check-circle mr-2 text-success"></i>
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Profile Card (Left Column) -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-body text-center p-4">
                    <!-- Avatar -->
                    <div class="mb-3 d-flex justify-content-center">
                        <img class="img-profile rounded-circle shadow-sm" 
                             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff&size=200" 
                             alt="{{ Auth::user()->name }}"
                             style="width: 130px; height: 130px; border: 4px solid #dbeafe; object-fit: cover;">
                    </div>
                    
                    <h4 class="font-weight-bold text-dark mb-1">{{ Auth::user()->name }}</h4>
                    <span class="badge badge-light border text-primary font-weight-bold px-3 py-1.5 mb-4" style="font-size: 0.8rem;">
                        <i class="fas fa-user-tag mr-1"></i> Peternak
                    </span>
                    
                    <div class="border-top pt-3 text-left">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-square bg-primary-light mr-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <small class="text-muted font-weight-bold text-uppercase d-block" style="font-size: 0.7rem;">Email</small>
                                <span class="font-weight-bold text-dark small">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <div class="icon-square bg-info-light mr-3">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <small class="text-muted font-weight-bold text-uppercase d-block" style="font-size: 0.7rem;">Bergabung</small>
                                <span class="font-weight-bold text-dark small">{{ Auth::user()->created_at->isoFormat('D MMMM Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Information & Stats (Right Column) -->
        <div class="col-lg-8">
            <!-- Data Peternak -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">
                        <i class="fas fa-address-card text-primary mr-2"></i>Informasi Peternak
                    </h6>
                </div>
                <div class="card-body p-4">
                    @if($resident)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded-lg border-left-primary">
                                    <small class="text-muted font-weight-bold text-uppercase d-block mb-1" style="font-size: 0.7rem;">Nama Lengkap</small>
                                    <p class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-user text-primary mr-1.5"></i> {{ $resident->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded-lg border-left-primary">
                                    <small class="text-muted font-weight-bold text-uppercase d-block mb-1" style="font-size: 0.7rem;">Email</small>
                                    <p class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-envelope text-primary mr-1.5"></i> {{ $resident->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded-lg border-left-primary">
                                    <small class="text-muted font-weight-bold text-uppercase d-block mb-1" style="font-size: 0.7rem;">No. Telepon</small>
                                    <p class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-phone text-primary mr-1.5"></i> {{ $resident->phone ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded-lg border-left-primary">
                                    <small class="text-muted font-weight-bold text-uppercase d-block mb-1" style="font-size: 0.7rem;">Lokasi Budidaya</small>
                                    <p class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-water text-primary mr-1.5"></i> {{ $resident->farm_location ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 bg-light rounded-lg border-left-primary">
                                    <small class="text-muted font-weight-bold text-uppercase d-block mb-1" style="font-size: 0.7rem;">Alamat Lengkap</small>
                                    <p class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-map-marker-alt text-primary mr-1.5"></i> {{ $resident->address ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info border-0 shadow-sm rounded-lg mb-0">
                            <i class="fas fa-info-circle mr-2"></i> Data peternak belum terdaftar.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Statistik Aktivitas -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-xs font-weight-bold text-muted text-uppercase">Total Promosi</span>
                                <div class="icon-square bg-primary-light">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-0" style="font-size: 1.6rem;">{{ Auth::user()->promosi->count() }}</h3>
                        </div>
                        <span class="trend-badge-primary badge badge-primary px-2 py-1 mt-2 align-self-start">Listing Produk</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-xs font-weight-bold text-muted text-uppercase">Promosi Aktif</span>
                                <div class="icon-square bg-success-light">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-0" style="font-size: 1.6rem;">{{ Auth::user()->promosi->where('status', 'Aktif')->count() }}</h3>
                        </div>
                        <span class="trend-badge-success px-2 py-1 mt-2 align-self-start">Tayang</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-vizora h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-xs font-weight-bold text-muted text-uppercase">Total Views</span>
                                <div class="icon-square bg-info-light">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-0" style="font-size: 1.6rem;">{{ number_format(Auth::user()->promosi->sum('views')) }}</h3>
                        </div>
                        <span class="trend-badge-info px-2 py-1 mt-2 align-self-start">Dilihat Pembeli</span>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terkini -->
            <div class="card border-0 shadow-sm rounded-lg">
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="font-weight-bold text-dark m-0">
                        <i class="fas fa-history text-primary mr-2"></i>Promosi Terkini
                    </h6>
                    @if(Auth::user()->promosi->count() > 0)
                        <a href="{{ route('user.promosi.index') }}" class="btn btn-light border btn-sm font-weight-bold px-3 rounded-lg">
                            Lihat Semua
                        </a>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if(Auth::user()->promosi->count() > 0)
                        <div class="table-responsive border-0">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th>Judul Promosi</th>
                                        <th>Status</th>
                                        <th>Views</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Auth::user()->promosi->take(5) as $promo)
                                    <tr>
                                        <td class="font-weight-bold text-dark">{{ $promo->judul_promosi ?? $promo->title ?? 'Promosi' }}</td>
                                        <td>
                                            @if($promo->status == 'Aktif')
                                                <span class="badge badge-success px-2.5 py-1">Aktif</span>
                                            @else
                                                <span class="badge badge-secondary px-2.5 py-1">{{ $promo->status }}</span>
                                            @endif
                                        </td>
                                        <td class="small font-weight-bold text-primary">{{ number_format($promo->views ?? 0) }}</td>
                                        <td class="small text-muted">{{ $promo->created_at->format('d M Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-box-open fa-3x text-gray-300 mb-3"></i>
                            <p class="text-muted small mb-3">Belum ada aktivitas promosi terdaftar</p>
                            <a href="{{ route('user.promosi.create') }}" class="btn btn-primary btn-sm font-weight-bold rounded-lg px-3">
                                <i class="fas fa-plus mr-1"></i> Buat Promosi Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection