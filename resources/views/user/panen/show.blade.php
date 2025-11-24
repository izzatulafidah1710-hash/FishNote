@extends('userlayouts.app')

@section('title', 'Detail Data Panen')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Data Panen</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.panen.edit', $panen->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('user.panen.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Informasi Panen -->
                            <h5 class="text-primary"><i class="fas fa-info-circle"></i> Informasi Panen</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Tanggal Panen</th>
                                    <td>{{ $panen->tanggal_panen->format('d/m/Y') }} ({{ $panen->tanggal_panen->diffForHumans() }})</td>
                                </tr>
                                <tr>
                                    <th>Jenis Ikan</th>
                                    <td><span class="badge badge-success badge-lg">{{ $panen->jenis_ikan }}</span></td>
                                </tr>
                                <tr>
                                    <th>Kolam</th>
                                    <td><span class="badge badge-secondary badge-lg">{{ $panen->kolam }}</span></td>
                                </tr>
                                <tr>
                                    <th>Status Penjualan</th>
                                    <td>
                                        <span class="badge badge-{{ $panen->status_badge }} badge-lg">
                                            {{ $panen->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pembeli</th>
                                    <td>{{ $panen->pembeli ?: '-' }}</td>
                                </tr>
                            </table>

                            <!-- Data Kuantitas -->
                            <h5 class="text-primary mt-4"><i class="fas fa-fish"></i> Data Kuantitas</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Jumlah Ikan</th>
                                    <td class="font-weight-bold">{{ number_format($panen->jumlah_ikan) }} Ekor</td>
                                </tr>
                                <tr>
                                    <th>Berat Total</th>
                                    <td class="font-weight-bold text-success">{{ number_format($panen->berat_total, 2) }} Kg</td>
                                </tr>
                                <tr>
                                    <th>Berat Rata-rata Per Ekor</th>
                                    <td>{{ number_format($panen->berat_rata_rata, 2) }} Kg/ekor</td>
                                </tr>
                            </table>

                            <!-- Data Finansial -->
                            <h5 class="text-primary mt-4"><i class="fas fa-money-bill-wave"></i> Data Finansial</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Harga Per Kg</th>
                                    <td>Rp {{ number_format($panen->harga_per_kg, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-light">
                                    <th>Total Pendapatan</th>
                                    <td class="font-weight-bold text-success" style="font-size: 1.2rem;">
                                        Rp {{ number_format($panen->total_pendapatan, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Perhitungan Detail -->
                            <div class="alert alert-info">
                                <h6 class="alert-heading"><i class="fas fa-calculator"></i> Perhitungan</h6>
                                <p class="mb-1">
                                    <strong>Berat Rata-rata:</strong> {{ number_format($panen->berat_total, 2) }} Kg ÷ {{ number_format($panen->jumlah_ikan) }} Ekor = {{ number_format($panen->berat_rata_rata, 2) }} Kg/ekor
                                </p>
                                <p class="mb-0">
                                    <strong>Total Pendapatan:</strong> {{ number_format($panen->berat_total, 2) }} Kg × Rp {{ number_format($panen->harga_per_kg, 0, ',', '.') }} = Rp {{ number_format($panen->total_pendapatan, 0, ',', '.') }}
                                </p>
                            </div>

                            <!-- Keterangan -->
                            @if($panen->keterangan)
                            <h5 class="text-primary mt-4"><i class="fas fa-sticky-note"></i> Keterangan</h5>
                            <div class="alert alert-secondary">
                                {{ $panen->keterangan }}
                            </div>
                            @endif

                            <!-- Timestamp -->
                            <div class="text-muted small mt-3">
                                <i class="far fa-clock"></i> Dibuat: {{ $panen->created_at->format('d/m/Y H:i') }}
                                @if($panen->updated_at != $panen->created_at)
                                    | <i class="fas fa-edit"></i> Terakhir diubah: {{ $panen->updated_at->format('d/m/Y H:i') }}
                                @endif
                            </div>
                        </div>

                        <!-- Foto Panen & Actions -->
                        <div class="col-md-4">
                            <!-- Foto -->
                            <h5 class="text-primary"><i class="fas fa-camera"></i> Foto Panen</h5>
                            @if($panen->foto)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $panen->foto) }}" 
                                         alt="Foto Panen" 
                                         class="img-fluid img-thumbnail" 
                                         style="max-height: 400px;"
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300?text=Foto+Tidak+Tersedia';">
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $panen->foto) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-search-plus"></i> Lihat Full Size
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p class="mb-0">Tidak ada foto panen</p>
                                </div>
                            @endif

                            <!-- Ringkasan Card -->
                            <div class="card bg-gradient-success">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="fas fa-chart-line"></i> Ringkasan</h5>
                                    <hr class="bg-white">
                                    <div class="text-white">
                                        <p class="mb-2">
                                            <i class="fas fa-fish"></i> 
                                            <strong>{{ number_format($panen->jumlah_ikan) }}</strong> Ekor
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-weight"></i> 
                                            <strong>{{ number_format($panen->berat_total, 2) }}</strong> Kg
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-chart-bar"></i> 
                                            <strong>{{ number_format($panen->berat_rata_rata, 2) }}</strong> Kg/ekor
                                        </p>
                                        <hr class="bg-white">
                                        <p class="mb-0" style="font-size: 1.2rem;">
                                            <i class="fas fa-money-bill-wave"></i> 
                                            <strong>Rp {{ number_format($panen->total_pendapatan, 0, ',', '.') }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-3">
                                <a href="{{ route('user.panen.edit', $panen->id) }}" class="btn btn-warning btn-block">
                                    <i class="fas fa-edit"></i> Edit Data Panen
                                </a>
                                <form action="{{ route('user.panen.destroy', $panen->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin ingin menghapus data panen ini?')">
                                        <i class="fas fa-trash"></i> Hapus Data Panen
                                    </button>
                                </form>
                                <a href="{{ route('user.panen.index') }}" class="btn btn-secondary btn-block mt-2">
                                    <i class="fas fa-list"></i> Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-lg {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}
</style>
@endsection