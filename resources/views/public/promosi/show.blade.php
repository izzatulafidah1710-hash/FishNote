<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $promosi->judul_promosi }} - FishNote</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .breadcrumb-custom {
            background: #f8f9fc;
            border-radius: 10px;
            padding: 15px 20px;
        }
        
        .product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
        }
        
        .price-box {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 25px rgba(72, 187, 120, 0.3);
        }
        
        .price-label {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 10px;
        }
        
        .price-value {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .price-unit {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .info-box {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .info-item {
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #718096;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1.1rem;
            color: #2d3748;
            font-weight: 500;
        }
        
        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        
        .whatsapp-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.5);
            color: white;
            text-decoration: none;
        }
        
        .badge-custom {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 50px;
        }
        
        .description-box {
            background: #f7fafc;
            border-left: 4px solid #667eea;
            padding: 25px;
            border-radius: 10px;
            margin: 30px 0;
        }
        
        .sticky-contact {
            position: sticky;
            top: 20px;
        }
        
        .stats-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .stats-icon {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stats-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
        }
        
        .stats-label {
            color: #718096;
            font-size: 0.9rem;
        }
        
        .alert-custom {
            border-radius: 10px;
            border: none;
            padding: 20px;
        }
        
        .seller-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('promosi.public.index') }}">
                <i class="fas fa-fish"></i> <strong>FishNote</strong>
            </a>
            <div>
                <a href="{{ route('promosi.public.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container mt-4">
        <nav class="breadcrumb-custom" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('promosi.public.index') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('promosi.public.index') }}?jenis_ikan={{ $promosi->jenis_ikan }}">
                        {{ $promosi->jenis_ikan }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $promosi->judul_promosi }}</li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Column: Product Info -->
            <div class="col-lg-8">
                <!-- Product Image -->
                @if($promosi->foto)
                <img src="{{ asset('storage/' . $promosi->foto) }}" 
                     alt="{{ $promosi->judul_promosi }}" 
                     class="product-image mb-4"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/800x500?text=Foto+Produk';">
                @else
                <div class="d-flex align-items-center justify-content-center bg-light product-image mb-4">
                    <div class="text-center">
                        <i class="fas fa-image fa-5x text-secondary mb-3"></i>
                        <p class="text-muted">Tidak ada foto produk</p>
                    </div>
                </div>
                @endif

                <!-- Product Title & Badge -->
                <div class="mb-4">
                    <h1 class="product-title">{{ $promosi->judul_promosi }}</h1>
                    <div>
                        <span class="badge badge-success badge-custom mr-2">
                            <i class="fas fa-fish"></i> {{ $promosi->jenis_ikan }}
                        </span>
                        <span class="badge badge-primary badge-custom">
                            <i class="fas fa-check-circle"></i> Aktif
                        </span>
                    </div>
                </div>

                <!-- Stats -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="stats-item">
                            <div class="stats-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="stats-value">{{ number_format($promosi->views) }}</div>
                            <div class="stats-label">Kali Dilihat</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stats-item">
                            <div class="stats-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="stats-value">{{ number_format($promosi->stok_tersedia) }}</div>
                            <div class="stats-label">{{ $promosi->satuan }} Tersedia</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stats-item">
                            <div class="stats-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stats-value">{{ $promosi->sisa_hari }}</div>
                            <div class="stats-label">Hari Lagi</div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="description-box">
                    <h4 class="mb-3">
                        <i class="fas fa-info-circle text-primary"></i> Deskripsi Produk
                    </h4>
                    <p class="mb-0" style="line-height: 1.8; font-size: 1.05rem;">
                        {{ $promosi->deskripsi }}
                    </p>
                </div>

                <!-- Product Details -->
                <div class="info-box">
                    <h4 class="mb-4">
                        <i class="fas fa-list-ul text-primary"></i> Detail Produk
                    </h4>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-fish"></i> Jenis Ikan
                        </div>
                        <div class="info-value">{{ $promosi->jenis_ikan }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-box"></i> Stok Tersedia
                        </div>
                        <div class="info-value">
                            {{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}
                            @if($promosi->stok_tersedia <= 10)
                            <span class="badge badge-warning ml-2">STOK TERBATAS!</span>
                            @endif
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-map-marker-alt"></i> Lokasi
                        </div>
                        <div class="info-value">{{ $promosi->lokasi ?: 'Tidak disebutkan' }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-calendar-alt"></i> Periode Promosi
                        </div>
                        <div class="info-value">
                            {{ $promosi->tanggal_mulai->format('d M Y') }} - {{ $promosi->tanggal_berakhir->format('d M Y') }}
                        </div>
                    </div>
                </div>

                <!-- Alert Stock -->
                @if($promosi->stok_tersedia <= 10)
                <div class="alert alert-warning alert-custom">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <strong>Perhatian!</strong> Stok terbatas. Segera hubungi penjual sebelum kehabisan!
                </div>
                @endif
            </div>

            <!-- Right Column: Price & Contact -->
            <div class="col-lg-4">
                <div class="sticky-contact">
                    <!-- Price Box -->
                    <div class="price-box">
                        <div class="price-label">Harga</div>
                        <div class="price-value">Rp {{ number_format($promosi->harga, 0, ',', '.') }}</div>
                        <div class="price-unit">per {{ $promosi->satuan }}</div>
                    </div>

                    <!-- Contact Button -->
                    <div class="text-center mb-4">
                        <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan *{{ urlencode($promosi->judul_promosi) }}* yang dijual seharga Rp {{ number_format($promosi->harga, 0, ',', '.') }}/{{ $promosi->satuan }}. Apakah masih tersedia?" 
                           target="_blank" 
                           class="whatsapp-btn d-block">
                            <i class="fab fa-whatsapp fa-lg"></i> Hubungi Penjual
                        </a>
                    </div>

                    <!-- Seller Info -->
                    <div class="seller-info">
                        <h5 class="mb-3">
                            <i class="fas fa-user-circle"></i> Informasi Penjual
                        </h5>
                        <div class="mb-2">
                            <i class="fas fa-phone"></i> 
                            <strong>{{ $promosi->kontak }}</strong>
                        </div>
                        @if($promosi->lokasi)
                        <div class="mb-2">
                            <i class="fas fa-map-marker-alt"></i> 
                            {{ $promosi->lokasi }}
                        </div>
                        @endif
                        <div class="mt-3 pt-3 border-top border-light">
                            <small>
                                <i class="fas fa-clock"></i> 
                                Promosi dibuat {{ $promosi->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="info-box mt-3">
                        <h6 class="mb-3">
                            <i class="fas fa-share-alt"></i> Bagikan Promosi
                        </h6>
                        <div class="d-flex justify-content-around">
                            <a href="https://wa.me/?text=Lihat promosi ini: {{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="btn btn-success btn-sm">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="btn btn-primary btn-sm">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($promosi->judul_promosi) }}" 
                               target="_blank" 
                               class="btn btn-info btn-sm">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Safety Tips -->
                    <div class="alert alert-info alert-custom mt-3">
                        <h6 class="font-weight-bold">
                            <i class="fas fa-shield-alt"></i> Tips Aman Bertransaksi
                        </h6>
                        <ul class="mb-0 pl-3" style="font-size: 0.9rem;">
                            <li>Cek kondisi ikan sebelum membeli</li>
                            <li>Bertemu langsung dengan penjual</li>
                            <li>Periksa stok ketersediaan</li>
                            <li>Tanyakan detail produk via WhatsApp</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Promotions -->
        <div class="mt-5">
            <h3 class="mb-4">
                <i class="fas fa-tags"></i> Promosi Lainnya
            </h3>
            <div class="row">
                @php
                    $relatedPromosi = \App\Models\Promosi::active()
                        ->where('jenis_ikan', $promosi->jenis_ikan)
                        ->where('id', '!=', $promosi->id)
                        ->limit(3)
                        ->get();
                @endphp

                @forelse($relatedPromosi as $related)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        @if($related->foto)
                        <img src="{{ asset('storage/' . $related->foto) }}" 
                             class="card-img-top" 
                             alt="{{ $related->judul_promosi }}"
                             style="height: 200px; object-fit: cover;">
                        @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-secondary"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold">{{ Str::limit($related->judul_promosi, 50) }}</h6>
                            <p class="text-success font-weight-bold mb-2">
                                Rp {{ number_format($related->harga, 0, ',', '.') }}/{{ $related->satuan }}
                            </p>
                            <a href="{{ route('promosi.public.show', $related->id) }}" class="btn btn-primary btn-sm btn-block">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Tidak ada promosi sejenis lainnya
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 FishNote. Semua Hak Dilindungi.</p>
            <p class="mb-0 small">Platform Jual Beli Ikan Segar dari Peternak Terpercaya</p>
        </div>
    </footer>

    <!-- jQuery & Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>