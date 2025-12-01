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
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <img class="img-profile rounded-circle mb-3" 
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4e73df&color=fff&size=150" 
                         alt="{{ Auth::user()->name }}"
                         style="width: 150px; height: 150px;">
                    
                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-3">
                        <i class="fas fa-user-tag"></i> Peternak
                    </p>
                    
                    <div class="text-left">
                        <p class="mb-2">
                            <i class="fas fa-envelope text-primary"></i> 
                            <strong>Email:</strong><br>
                            <span class="ml-4">{{ Auth::user()->email }}</span>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar text-primary"></i> 
                            <strong>Bergabung:</strong><br>
                            <span class="ml-4">{{ Auth::user()->created_at->format('d M Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Information -->
        <div class="col-lg-8">
            <!-- Data Peternak -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle"></i> Informasi Peternak
                    </h6>
                </div>
                <div class="card-body">
                    @if($resident)
                        <table class="table table-borderless">
                            <tr>
                                <td width="30%"><strong><i class="fas fa-user"></i> Nama Lengkap</strong></td>
                                <td>: {{ $resident->name }}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="fas fa-envelope"></i> Email</strong></td>
                                <td>: {{ $resident->email }}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="fas fa-phone"></i> No. Telepon</strong></td>
                                <td>: {{ $resident->phone ?: 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="fas fa-map-marker-alt"></i> Alamat</strong></td>
                                <td>: {{ $resident->address ?: 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="fas fa-water"></i> Lokasi Budidaya</strong></td>
                                <td>: {{ $resident->farm_location ?: 'Belum diisi' }}</td>
                            </tr>
                        </table>
                    @else
                        <p class="text-muted">Data peternak tidak ditemukan.</p>
                    @endif
                </div>
            </div>

            <!-- Statistik -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-bar"></i> Statistik Aktivitas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <div class="border rounded p-3">
                                <i class="fas fa-bullhorn fa-2x text-primary mb-2"></i>
                                <h4 class="mb-0">{{ Auth::user()->promosi->count() }}</h4>
                                <small class="text-muted">Total Promosi</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <div class="border rounded p-3">
                                <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                                <h4 class="mb-0">{{ Auth::user()->promosi->where('status', 'Aktif')->count() }}</h4>
                                <small class="text-muted">Promosi Aktif</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <div class="border rounded p-3">
                                <i class="fas fa-eye fa-2x text-info mb-2"></i>
                                <h4 class="mb-0">{{ Auth::user()->promosi->sum('views') }}</h4>
                                <small class="text-muted">Total Views</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection