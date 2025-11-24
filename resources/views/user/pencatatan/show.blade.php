@extends('layouts.app')

@section('title', 'Detail Pencatatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pencatatan</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.pencatatan.edit', $pencatatan->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('user.pencatatan.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Informasi Umum -->
                            <h5 class="text-primary"><i class="fas fa-info-circle"></i> Informasi Umum</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Tanggal</th>
                                    <td>{{ $pencatatan->tanggal->format('d/m/Y') }} ({{ $pencatatan->tanggal->diffForHumans() }})</td>
                                </tr>
                                <tr>
                                    <th>Jenis Ikan</th>
                                    <td><span class="badge badge-success badge-lg">{{ $pencatatan->jenis_ikan }}</span></td>
                                </tr>
                                <tr>
                                    <th>Kolam</th>
                                    <td><span class="badge badge-secondary badge-lg">{{ $pencatatan->kolam }}</span></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kegiatan</th>
                                    <td><span class="badge badge-info badge-lg">{{ $pencatatan->jenis_kegiatan }}</span></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $pencatatan->keterangan ?: '-' }}</td>
                                </tr>
                            </table>

                            <!-- Data Pakan & Ikan -->
                            <h5 class="text-primary mt-4"><i class="fas fa-fish"></i> Data Pakan & Ikan</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Jumlah Pakan</th>
                                    <td>{{ $pencatatan->jumlah_pakan ? number_format($pencatatan->jumlah_pakan, 2) . ' Kg' : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Berat Ikan</th>
                                    <td>{{ $pencatatan->berat_ikan ? number_format($pencatatan->berat_ikan, 2) . ' Kg' : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Ikan</th>
                                    <td>{{ $pencatatan->jumlah_ikan ? number_format($pencatatan->jumlah_ikan) . ' Ekor' : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Kondisi Ikan</th>
                                    <td>
                                        @if($pencatatan->kondisi_ikan)
                                            @if($pencatatan->kondisi_ikan == 'Sehat')
                                                <span class="badge badge-success">{{ $pencatatan->kondisi_ikan }}</span>
                                            @elseif($pencatatan->kondisi_ikan == 'Sakit')
                                                <span class="badge badge-warning">{{ $pencatatan->kondisi_ikan }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $pencatatan->kondisi_ikan }}</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <!-- Data Kualitas Air -->
                            <h5 class="text-primary mt-4"><i class="fas fa-water"></i> Data Kualitas Air</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Suhu Air</th>
                                    <td>{{ $pencatatan->suhu_air ? number_format($pencatatan->suhu_air, 2) . ' °C' : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>pH Air</th>
                                    <td>
                                        @if($pencatatan->ph_air)
                                            {{ number_format($pencatatan->ph_air, 2) }}
                                            @if($pencatatan->ph_air >= 6.5 && $pencatatan->ph_air <= 8.5)
                                                <span class="badge badge-success">Normal</span>
                                            @else
                                                <span class="badge badge-warning">Perlu Perhatian</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Oksigen</th>
                                    <td>{{ $pencatatan->oksigen ? number_format($pencatatan->oksigen, 2) . ' mg/L' : '-' }}</td>
                                </tr>
                            </table>

                            <!-- Biaya -->
                            <h5 class="text-primary mt-4"><i class="fas fa-money-bill-wave"></i> Biaya Operasional</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Total Biaya</th>
                                    <td class="text-danger font-weight-bold">
                                        {{ $pencatatan->biaya ? 'Rp ' . number_format($pencatatan->biaya, 0, ',', '.') : '-' }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Timestamp -->
                            <div class="text-muted small mt-3">
                                <i class="far fa-clock"></i> Dibuat: {{ $pencatatan->created_at->format('d/m/Y H:i') }}
                                @if($pencatatan->updated_at != $pencatatan->created_at)
                                    | <i class="fas fa-edit"></i> Terakhir diubah: {{ $pencatatan->updated_at->format('d/m/Y H:i') }}
                                @endif
                            </div>
                        </div>

                        <!-- Foto Dokumentasi -->
                        <div class="col-md-4">
                            <h5 class="text-primary"><i class="fas fa-camera"></i> Foto Dokumentasi</h5>
                            @if($pencatatan->foto)
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $pencatatan->foto) }}" alt="Foto Pencatatan" class="img-fluid img-thumbnail" style="max-height: 400px;">
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $pencatatan->foto) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-search-plus"></i> Lihat Full Size
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p class="mb-0">Tidak ada foto dokumentasi</p>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="mt-4">
                                <a href="{{ route('user.pencatatan.edit', $pencatatan->id) }}" class="btn btn-warning btn-block">
                                    <i class="fas fa-edit"></i> Edit Pencatatan
                                </a>
                                <form action="{{ route('user.pencatatan.destroy', $pencatatan->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin ingin menghapus pencatatan ini?')">
                                        <i class="fas fa-trash"></i> Hapus Pencatatan
                                    </button>
                                </form>
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