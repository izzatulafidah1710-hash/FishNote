<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $promosi->judul_promosi }} - FishNote</title>
    <link rel="icon" type="image/png" href="{{ asset('template/img/logofishnote.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        .glass-nav {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.12), 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .liquid-nav-link {
            padding: 0.45rem 0.9rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #64748b;
            transition: color 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .liquid-nav-link:hover {
            color: #2563eb;
        }

        .liquid-nav-active {
            color: #1d4ed8 !important;
            font-weight: 700 !important;
            border-bottom: 2px solid #2563eb;
        }

        .card-lumilearn {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-sky-100/90 via-blue-50/50 to-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen">

    <!-- NAVBAR (LumiLearn Clean White Style) -->
    <nav class="glass-nav border-b border-slate-100 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo (New Custom FishNote Logo Image) -->
                <a href="{{ route('landing') }}" class="flex items-center group py-1">
                    <img src="{{ asset('template/img/logo1.png') }}?v={{ time() }}" 
                         alt="FishNote Logo" 
                         class="h-10 sm:h-12 w-auto object-contain group-hover:scale-105 transition-transform duration-300">
                </a>

                <!-- Desktop Navigation Links & Action Buttons (Grouped on the right) -->
                <div class="hidden md:flex items-center justify-end flex-1">
                    <!-- Nav Links -->
                    <div class="flex items-center space-x-2 text-sm mr-4 lg:mr-6">
                        <a href="{{ route('landing') }}" class="liquid-nav-link">Beranda</a>
                        <a href="{{ route('promosi') }}" class="liquid-nav-link liquid-nav-active">Promosi</a>
                        <a href="{{ route('artikel.index') }}" class="liquid-nav-link">Artikel</a>
                        <a href="{{ route('about') }}" class="liquid-nav-link">Tentang Kami</a>
                        <a href="#kontak" class="liquid-nav-link">Kontak</a>
                    </div>

                    <!-- Search Menu -->
                    <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center relative mr-6 group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-slate-400 text-xs group-focus-within:text-brand-500 transition-colors"></i>
                        </div>
                        <input type="text" name="q" placeholder="Cari produk..." 
                            class="w-36 xl:w-48 pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs rounded-full focus:outline-none focus:ring-1 focus:ring-brand-500 focus:border-brand-500 focus:bg-white focus:w-48 xl:focus:w-56 transition-all duration-300"
                            value="{{ request('q') }}">
                    </form>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-3 border-l border-slate-200 pl-6">
                        <a href="{{ route('login') }}" class="px-6 py-2 border-2 border-brand-600 text-brand-600 font-bold text-sm hover:bg-brand-50 rounded-full transition duration-200">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm rounded-full shadow-lg shadow-brand-600/25 hover:shadow-brand-600/40 hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                            <span>Daftar Gratis</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile Hamburger Button -->
                <button class="md:hidden p-2 text-slate-600 hover:text-brand-600 rounded-xl" onclick="toggleMobileMenu()">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white/95 backdrop-blur-xl border-b border-slate-200 px-4 pt-3 pb-6 space-y-2">
            <form action="{{ route('search') }}" method="GET" class="relative mb-3">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-slate-400 text-sm"></i>
                </div>
                <input type="text" name="q" placeholder="Cari jenis ikan atau lokasi..." 
                    class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:outline-none focus:ring-1 focus:ring-brand-500 focus:bg-white transition-all duration-300"
                    value="{{ request('q') }}">
            </form>
            <a href="{{ route('landing') }}" class="liquid-nav-link w-full text-left justify-start">Beranda</a>
            <a href="{{ route('promosi') }}" class="liquid-nav-link liquid-nav-active w-full text-left justify-start">Promosi</a>
            <a href="{{ route('artikel.index') }}" class="liquid-nav-link w-full text-left justify-start">Artikel</a>
            <a href="{{ route('about') }}" class="liquid-nav-link w-full text-left justify-start">Tentang Kami</a>
            <a href="#kontak" class="liquid-nav-link w-full text-left justify-start">Kontak</a>
            <div class="pt-3 border-t border-slate-100 flex flex-col space-y-2">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-bold text-brand-600 border border-brand-600/30 rounded-xl">Masuk</a>
                <a href="{{ route('register') }}" class="w-full text-center py-2.5 font-bold text-white bg-brand-600 rounded-xl shadow-md">Daftar Gratis</a>
            </div>
        </div>
    </nav>

    <!-- BREADCRUMB BAR -->
    <div class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 py-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-2 text-xs sm:text-sm font-medium text-slate-500 overflow-x-auto whitespace-nowrap">
                <a href="{{ route('landing') }}" class="hover:text-brand-600 transition-colors">Beranda</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <a href="{{ route('promosi') }}" class="hover:text-brand-600 transition-colors">Katalog Promosi</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <span class="text-slate-900 font-semibold truncate">{{ $promosi->jenis_ikan }}</span>
            </div>
        </div>
    </div>

    <!-- MAIN PRODUCT DETAIL CONTENT -->
    <main class="py-8 lg:py-12 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- SINGLE UNIFIED GLASS CARD -->
            <div class="relative bg-gradient-to-b from-white/40 to-white/90 backdrop-blur-xl shadow-2xl shadow-brand-900/5 rounded-none p-5 sm:p-8 lg:p-10 overflow-hidden">
                
                <div class="grid lg:grid-cols-3 gap-8 lg:gap-10">
                    
                    <!-- LEFT COLUMN: Images & Details (2/3 width) -->
                    <div class="lg:col-span-2">
                        
                        <!-- Main Product Image -->
                        @if($promosi->foto)
                            <div class="relative group cursor-pointer overflow-hidden rounded-none shadow-sm bg-slate-100 aspect-video w-full mb-6" onclick="openModal('{{ asset('storage/' . $promosi->foto) }}')">
                                <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                     alt="{{ $promosi->jenis_ikan }}"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-bold text-sm gap-2 backdrop-blur-[2px]">
                                    <i class="fa-solid fa-expand text-lg"></i>
                                    <span>Perbesar Gambar</span>
                                </div>
                            </div>
                        @else
                            <div class="w-full aspect-video rounded-none bg-gradient-to-br from-slate-50 to-slate-100 flex flex-col items-center justify-center text-slate-300 mb-6 border border-slate-200/50">
                                <i class="fa-solid fa-fish text-6xl mb-4"></i>
                                <span class="text-sm font-medium text-slate-400">Tidak ada foto</span>
                            </div>
                        @endif

                        <!-- Header & Title -->
                        <div class="mb-6">
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-brand-100 text-brand-700 font-bold uppercase tracking-wider text-[11px] rounded-md">{{ $promosi->jenis_ikan }}</span>
                                <span class="px-3 py-1 bg-white/60 text-slate-600 font-medium text-[11px] rounded-md flex items-center gap-1.5 border border-slate-200/60">
                                    <i class="fa-solid fa-location-dot text-rose-500"></i> {{ $promosi->lokasi }}
                                </span>
                            </div>
                            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight mb-3 tracking-tight">
                                {{ $promosi->judul_promosi }}
                            </h1>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 font-medium">
                                <span class="flex items-center gap-2"><i class="fa-regular fa-eye text-slate-400"></i> {{ number_format($promosi->views) }} tayangan</span>
                                <span class="flex items-center gap-2"><i class="fa-regular fa-calendar text-slate-400"></i> Berakhir: {{ $promosi->tanggal_berakhir->format('d M Y') }}</span>
                            </div>
                        </div>

                        <div class="mb-4"></div>

                        <!-- Description -->
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-slate-900 mb-3">
                                Deskripsi Produk
                            </h2>
                            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-5 shadow-sm text-slate-600 leading-relaxed text-[15px] whitespace-pre-wrap">{{ $promosi->deskripsi }}</div>
                        </div>

                        <div class="mb-4"></div>

                        <!-- Specifications -->
                        <div>
                            <h2 class="text-xl font-bold text-slate-900 mb-4">
                                Spesifikasi Promosi
                            </h2>
                            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-5 shadow-sm">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                                    <div>
                                        <span class="text-slate-500 block mb-1 text-[11px] uppercase tracking-wider font-semibold">Jenis Ikan</span>
                                        <span class="font-bold text-slate-900 text-base">{{ $promosi->jenis_ikan }}</span>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block mb-1 text-[11px] uppercase tracking-wider font-semibold">Lokasi Pembudidaya</span>
                                        <span class="font-bold text-slate-900 text-base">{{ $promosi->lokasi }}</span>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block mb-1 text-[11px] uppercase tracking-wider font-semibold">Satuan Penjualan</span>
                                        <span class="font-bold text-slate-900 text-base">{{ $promosi->satuan }}</span>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block mb-1 text-[11px] uppercase tracking-wider font-semibold">Masa Aktif</span>
                                        <span class="font-bold text-slate-900 text-base">
                                            @if($promosi->sisa_hari > 0)
                                                <span class="text-brand-600">{{ $promosi->sisa_hari }} Hari Lagi</span>
                                            @else
                                                <span class="text-rose-600">Berakhir</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- RIGHT COLUMN: Price & Contact Card (1/3 width) -->
                    <div class="lg:col-span-1 pt-6 lg:pt-0 lg:pl-8 space-y-6">
                        
                        <!-- Status Tag -->
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center gap-1.5 text-emerald-600 text-[13px] font-bold">
                                <i class="fa-solid fa-circle-check"></i> {{ $promosi->status ?? 'Tersedia' }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium bg-white/50 px-2 py-1 rounded-md border border-slate-100">ID: #{{ $promosi->id }}</span>
                        </div>

                        <!-- Price & Stock Box -->
                        <div class="pb-6">
                            <span class="text-xs text-slate-500 font-bold uppercase tracking-widest block mb-2">Harga Penawaran</span>
                            <div class="text-4xl font-black text-slate-900 tracking-tight">
                                Rp {{ number_format($promosi->harga, 0, ',', '.') }}
                                <span class="text-sm font-bold text-slate-500">/{{ $promosi->satuan }}</span>
                            </div>
                            
                            <div class="mt-5 flex items-center justify-between bg-white/60 p-3.5 rounded-xl border border-white shadow-sm">
                                <span class="text-[13px] font-medium text-slate-600">Stok Tersedia</span>
                                <span class="text-sm font-bold text-slate-900">{{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}</span>
                            </div>
                            @if($promosi->stok_tersedia <= 10)
                                <div class="mt-3 text-amber-700 text-[11px] font-medium flex items-center gap-2 bg-amber-100/50 p-2.5 rounded-lg border border-amber-200/50">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Stok terbatas, segera hubungi penjual!
                                </div>
                            @endif
                        </div>

                        <!-- WhatsApp Action Button -->
                        <div>
                            <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan promosi {{ urlencode($promosi->judul_promosi) }} di FishNote." 
                               target="_blank"
                               class="w-full py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-extrabold rounded-2xl transition-all duration-300 shadow-xl shadow-emerald-600/30 flex items-center justify-center gap-2 text-base hover:-translate-y-1">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                                <span>Hubungi Penjual</span>
                            </a>
                            <p class="text-center text-[11px] text-slate-400 mt-3 font-medium">
                                Langsung terhubung via WhatsApp
                            </p>
                        </div>

                        <!-- Contact Details -->
                        <div class="p-4 bg-white/50 backdrop-blur-sm border border-white shadow-sm rounded-2xl text-xs space-y-2">
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Nomor WhatsApp:</span>
                                <span class="font-bold text-slate-900">{{ $promosi->kontak }}</span>
                            </div>
                        </div>

                        <!-- Social Share -->
                        <div class="pt-2">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block mb-3">Bagikan Promosi</span>
                            <div class="grid grid-cols-3 gap-2">
                                <button onclick="shareWA()" class="py-2.5 bg-emerald-50/80 hover:bg-emerald-100 text-emerald-700 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-colors border border-emerald-100">
                                    <i class="fa-brands fa-whatsapp"></i> WA
                                </button>
                                <button onclick="shareFB()" class="py-2.5 bg-indigo-50/80 hover:bg-indigo-100 text-indigo-700 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-colors border border-indigo-100">
                                    <i class="fa-brands fa-facebook"></i> FB
                                </button>
                                <button onclick="copyURL()" class="py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-colors border border-slate-200">
                                    <i class="fa-solid fa-link"></i> Salin
                                </button>
                            </div>
                        </div>

                        <!-- Safe Transaction Banner -->
                        <div class="p-4 bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200/60 rounded-2xl text-xs text-amber-900 space-y-2 shadow-sm">
                            <span class="font-bold flex items-center gap-1.5">
                                <i class="fa-solid fa-shield-halved text-amber-600"></i> Tips Transaksi Aman
                            </span>
                            <ul class="list-disc list-inside space-y-1 text-[11px] text-amber-800/90 pl-1 leading-relaxed">
                                <li>Konfirmasi pesanan via WhatsApp.</li>
                                <li>Pastikan periksa barang langsung sebelum bayar.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('promosi') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white/60 backdrop-blur-md border border-white/80 text-slate-700 hover:text-brand-600 hover:bg-white font-bold rounded-full transition-all shadow-sm text-sm">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Katalog</span>
                </a>
            </div>
        </div>
    </main>

    <!-- FOOTER SECTION -->
    <footer id="kontak" class="bg-slate-950 text-white pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mb-12">
                <!-- Col 1: Brand -->
                <div class="space-y-4">
                    <a href="{{ route('landing') }}" class="inline-flex items-center group hover:scale-105 transition-transform">
                        <img src="{{ asset('template/img/logo1.png') }}?v={{ time() }}" 
                             alt="FishNote Logo" 
                             class="h-10 w-auto object-contain">
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Platform pencatatan digital dan promosi hasil budidaya perikanan modern terintegrasi di Indonesia.
                    </p>
                </div>

                <!-- Col 2: Navigation -->
                <div>
                    <h4 class="text-base font-bold text-white mb-4">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ route('landing') }}" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Beranda</a></li>
                        <li><a href="{{ route('promosi') }}" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Katalog Promosi</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Masuk Akun</a></li>
                    </ul>
                </div>

                <!-- Col 3: Support -->
                <div>
                    <h4 class="text-base font-bold text-white mb-4">Pusat Bantuan</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="#" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Panduan Peternak</a></li>
                        <li><a href="#" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Cara Membeli</a></li>
                        <li><a href="#" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-brand-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-brand-500"></i> Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div>
                    <h4 class="text-base font-bold text-white mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope text-brand-500 mt-1"></i>
                            <span>admin@fishnote.com</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-phone text-brand-500 mt-1"></i>
                            <span>+62 831-6759-1147</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-brand-500 mt-1"></i>
                            <span>Bengkalis, Riau, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-900 text-center text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>&copy; 2025 FishNote Indonesia. All Rights Reserved.</p>
                <div class="flex space-x-6 text-slate-400">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Fullscreen Image Zoom Modal -->
    <div id="modal" class="hidden fixed inset-0 bg-slate-950/90 z-50 flex items-center justify-center p-4 backdrop-blur-md" onclick="closeModal()">
        <button onclick="closeModal()" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center transition-colors">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <img id="modalImg" src="" class="max-w-full max-h-[90vh] rounded-2xl shadow-2xl object-contain">
    </div>

    <!-- Scripts -->
    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        function openModal(src) {
            document.getElementById('modalImg').src = src;
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function shareWA() {
            window.open('https://wa.me/?text=' + encodeURIComponent('{{ $promosi->jenis_ikan }} - ' + window.location.href), '_blank');
        }

        function shareFB() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank');
        }

        function copyURL() {
            navigator.clipboard.writeText(window.location.href).then(() => alert('Link promosi berhasil disalin!'));
        }
    </script>
</body>

</html>