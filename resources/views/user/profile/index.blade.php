@extends('userlayouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user text-primary"></i> Profile Saya
        </h1>
        <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit Profile
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <div class="mb-4">
                        <img class="img-profile rounded-circle" 
                             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4e73df&color=fff&size=200" 
                             alt="{{ Auth::user()->name }}"
                             style="width: 150px; height: 150px; border: 4px solid #4e73df;">
                    </div>
                    
                    <h4 class="mb-2 font-weight-bold">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-4">
                        <i class="fas fa-user-tag"></i> Peternak
                    </p>
                    
                    <hr class="my-4">
                    
                    <div class="text-left px-3">
                        <div class="mb-3">
                            <i class="fas fa-envelope text-primary"></i> 
                            <strong>Email</strong>
                            <p class="mb-0 ml-4 text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-calendar text-primary"></i> 
                            <strong>Bergabung</strong>
                            <p class="mb-0 ml-4 text-muted">{{ Auth::user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Information -->
        <div class="col-lg-8">
            <!-- Data Peternak -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-info-circle"></i> Informasi Peternak
                    </h6>
                </div>
                <div class="card-body">
                    @if($resident)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="border-left border-primary pl-3">
                                    <small class="text-muted">Nama Lengkap</small>
                                    <p class="mb-0 font-weight-bold">
                                        <i class="fas fa-user text-primary"></i> {{ $resident->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="border-left border-primary pl-3">
                                    <small class="text-muted">Email</small>
                                    <p class="mb-0 font-weight-bold">
                                        <i class="fas fa-envelope text-primary"></i> {{ $resident->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="border-left border-primary pl-3">
                                    <small class="text-muted">No. Telepon</small>
                                    <p class="mb-0 font-weight-bold">
                                        <i class="fas fa-phone text-primary"></i> {{ $resident->phone ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="border-left border-primary pl-3">
                                    <small class="text-muted">Lokasi Budidaya</small>
                                    <p class="mb-0 font-weight-bold">
                                        <i class="fas fa-water text-primary"></i> {{ $resident->farm_location ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-left border-primary pl-3">
                                    <small class="text-muted">Alamat</small>
                                    <p class="mb-0 font-weight-bold">
                                        <i class="fas fa-map-marker-alt text-primary"></i> {{ $resident->address ?: 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Data peternak tidak ditemukan.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Statistik -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-chart-bar"></i> Statistik Aktivitas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Promosi
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ Auth::user()->promosi->count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Promosi Aktif
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ Auth::user()->promosi->where('status', 'Aktif')->count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Views
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ Auth::user()->promosi->sum('views') }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terkini (Optional - untuk mengisi space) -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-history"></i> Aktivitas Terkini
                    </h6>
                </div>
                <div class="card-body">
                    @if(Auth::user()->promosi->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
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
                                        <td>{{ $promo->title ?? 'Promosi' }}</td>
                                        <td>
                                            <span class="badge badge-{{ $promo->status == 'Aktif' ? 'success' : 'secondary' }}">
                                                {{ $promo->status }}
                                            </span>
                                        </td>
                                        <td>{{ $promo->views ?? 0 }}</td>
                                        <td>{{ $promo->created_at->format('d M Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                            <p class="text-muted">Belum ada aktivitas promosi</p>
                            <a href="{{ route('user.promosi.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Buat Promosi Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
</style>
@endsection