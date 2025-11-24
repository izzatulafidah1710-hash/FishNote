<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promosi Ikan Segar - FishNote</title>
    
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
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0 60px;
            margin-bottom: 40px;
        }
        
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .card-promo {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .card-promo:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        
        .card-img-wrapper {
            height: 220px;
            overflow: hidden;
            position: relative;
        }
        
        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .card-promo:hover .card-img-wrapper img {
            transform: scale(1.1);
        }
        
        .badge-custom {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 10;
        }
        
        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
        }
        
        .contact-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .contact-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
            color: white;
        }
        
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 font-weight-bold mb-3">
                    <i class="fas fa-fish"></i> FishNote
                </h1>
                <p class="lead">Temukan Ikan Segar Berkualitas dari Peternak Terpercaya</p>
            </div>
            
            <!-- Search Bar -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="GET" action="{{ route('promosi.public.index') }}">
                        <div class="input-group search-box">
                            <input type="text" name="search" class="form-control border-0" placeholder="Cari ikan yang Anda butuhkan..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4" type="submit" style="border-radius: 50px;">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('promosi.public.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label class="font-weight-bold">
                            <i class="fas fa-filter"></i> Filter Jenis Ikan
                        </label>
                        <select name="jenis_ikan" class="form-control" onchange="this.form.submit()">
                            <option value="">Semua Jenis Ikan</option>
                            <option value="Lele" {{ request('jenis_ikan') == 'Lele' ? 'selected' : '' }}>Lele</option>
                            <option value="Nila" {{ request('jenis_ikan') == 'Nila' ? 'selected' : '' }}>Nila</option>
                            <option value="Gurame" {{ request('jenis_ikan') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                            <option value="Mas" {{ request('jenis_ikan') == 'Mas' ? 'selected' : '' }}>Mas</option>
                            <option value="Patin" {{ request('jenis_ikan') == 'Patin' ? 'selected' : '' }}>Patin</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-0">
                            <i class="fas fa-bullhorn text-primary"></i> 
                            <strong>{{ $promosi->total() }}</strong> Promosi Tersedia
                        </p>
                    </div>
                    <div class="col-md-4 text-right">
                        @if(request()->has('jenis_ikan') || request()->has('search'))
                        <a href="{{ route('promosi.public.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo"></i> Reset Filter
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Daftar Promosi -->
        @if($promosi->count() > 0)
        <div class="row">
            @foreach($promosi as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-promo">
                    <!-- Foto -->
                    <div class="card-img-wrapper">
                        @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_promosi }}">
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                            <i class="fas fa-image fa-3x text-secondary"></i>
                        </div>
                        @endif
                        <span class="badge-custom">
                            <i class="fas fa-fish"></i> {{ $item->jenis_ikan }}
                        </span>
                    </div>

                    <div class="card-body">
                        <!-- Judul -->
                        <h5 class="card-title font-weight-bold mb-3">
                            {{ $item->judul_promosi }}
                        </h5>

                        <!-- Deskripsi -->
                        <p class="card-text text-muted mb-3">
                            {{ Str::limit($item->deskripsi, 100) }}
                        </p>

                        <!-- Info -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">
                                    <i class="fas fa-tag"></i> Harga
                                </span>
                                <span class="price-tag">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}/{{ $item->satuan }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">
                                    <i class="fas fa-box"></i> Stok
                                </span>
                                <span class="font-weight-bold text-primary">
                                    {{ number_format($item->stok_tersedia) }} {{ $item->satuan }}
                                </span>
                            </div>
                            @if($item->lokasi)
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <small>{{ $item->lokasi }}</small>
                            </div>
                            @endif
                        </div>

                        <!-- Buttons -->
                        <a href="{{ route('promosi.public.show', $item->id) }}" class="btn btn-outline-primary btn-block mb-2">
                            <i class="fas fa-info-circle"></i> Lihat Detail
                        </a>
                        <a href="https://wa.me/62{{ ltrim($item->kontak, '0') }}?text=Halo, saya tertarik dengan {{ urlencode($item->judul_promosi) }}" 
                           target="_blank" 
                           class="contact-btn btn-block">
                            <i class="fab fa-whatsapp"></i> Hubungi Penjual
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light">
                        <small class="text-muted">
                            <i class="fas fa-eye"></i> {{ number_format($item->views) }} kali dilihat
                            @if($item->sisa_hari > 0)
                            | <i class="fas fa-clock"></i> {{ $item->sisa_hari }} hari lagi
                            @endif
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $promosi->links() }}
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h4 class="text-muted">Tidak Ada Promosi Tersedia</h4>
            <p class="text-muted">Belum ada promosi yang sesuai dengan pencarian Anda.</p>
            <a href="{{ route('promosi.public.index') }}" class="btn btn-primary">
                <i class="fas fa-refresh"></i> Lihat Semua Promosi
            </a>
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 FishNote. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <!-- jQuery & Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>