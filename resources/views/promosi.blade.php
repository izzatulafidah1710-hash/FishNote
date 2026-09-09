<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Promosi Perikanan - FishNote</title>
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
        .card-lumilearn:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 30px -10px rgba(37, 99, 235, 0.14), 0 10px 15px -5px rgba(0, 0, 0, 0.03);
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
                    <img src="{{ asset('images/logo.png') }}?v={{ time() }}" 
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
                    class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-full focus:outline-none focus:ring-1 focus:ring-brand-500 focus:bg-white transition-all duration-300"
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

    <!-- LUMILEARN LIGHT HERO BANNER SECTION FOR PROMOSI -->
    <section class="py-16 lg:py-24 bg-gradient-to-b from-sky-100/80 via-blue-50/60 to-transparent relative overflow-hidden">
        <!-- Soft Blue Blob Background -->
        <div class="w-[450px] h-[450px] bg-gradient-to-tr from-blue-100 via-sky-100 to-indigo-100 rounded-full blur-3xl absolute -top-20 -right-20 -z-10 opacity-70"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 mb-4 leading-tight">
                Semua Promosi <span class="text-brand-600">Hasil Panen</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto mb-10 font-normal leading-relaxed">
                Temukan berbagai penawaran ikan segar dan bibit berkualitas dari peternak terpercaya di seluruh Indonesia.
            </p>

            <!-- Search Form -->
            <div class="max-w-2xl mx-auto mb-6">
                <form action="{{ route('promosi') }}" method="GET" class="flex flex-col sm:flex-row gap-2 p-1.5 bg-white rounded-full shadow-xl shadow-slate-900/5 border border-slate-200">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        </div>
                        <input type="text" name="q" placeholder="Cari jenis ikan, lokasi, atau peternak..."
                            class="w-full pl-9 pr-4 py-2.5 bg-transparent text-slate-900 placeholder-slate-400 focus:outline-none font-medium text-sm"
                            value="{{ request('q') }}">
                    </div>
                    <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-full shadow-md shadow-brand-600/30 flex items-center justify-center gap-2 text-sm transition">
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- CATALOG STATS & FILTER BAR -->
    <section class="py-2 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-2 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs sm:text-sm font-bold text-slate-700">Katalog Aktif:</span>
                    <span class="px-3 py-1 bg-brand-50 text-brand-700 text-xs font-extrabold rounded-lg ring-1 ring-brand-500/20">
                        {{ $promotions->count() }} Promosi Ditemukan
                    </span>
                </div>

                <div class="text-xs sm:text-sm font-medium text-slate-600">
                    @if (request('q'))
                        Hasil pencarian untuk "<span class="font-bold text-brand-600">{{ request('q') }}</span>"
                    @else
                        Menampilkan semua produk dari peternak terverifikasi
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- PROMOTION GRID SECTION (LumiLearn Card Style) -->
    <section class="py-12 lg:py-16 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                @forelse($promotions as $index => $promo)
                    <div class="card-lumilearn bg-white rounded-none border border-slate-200/80 overflow-hidden flex flex-col group">
                        
                        <!-- Image Container -->
                        <div class="relative overflow-hidden h-48 bg-slate-100">
                            @if ($promo->foto)
                                <img src="{{ asset('storage/' . $promo->foto) }}" alt="{{ $promo->jenis_ikan }}"
                                    class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-fish text-4xl mb-2"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex flex-col flex-1">
                            <!-- Location -->
                            <div class="flex items-center gap-1.5 text-[11px] text-slate-500 mb-2">
                                <i class="fa-solid fa-location-dot text-brand-500"></i>
                                <span class="font-medium">{{ $promo->lokasi ?? 'Bengkalis, Riau' }}</span>
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-lg font-bold text-slate-900 mb-1.5 group-hover:text-brand-600 transition-colors line-clamp-1">
                                {{ $promo->jenis_ikan }}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-2">
                                {{ Str::limit($promo->deskripsi, 65) }}
                            </p>

                            <!-- Price & Stock Container -->
                            <div class="mt-auto flex items-end justify-between">
                                <div>
                                    <span class="text-lg font-extrabold text-brand-600 tracking-tight">
                                        Rp {{ number_format($promo->harga, 0, ',', '.') }}<span class="text-[10px] text-slate-500 font-normal ml-1">/{{ $promo->satuan ?? 'kg' }}</span>
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-[11px] font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded-md">Stok: {{ number_format($promo->stok_tersedia) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Minimal Footer Action -->
                        <a href="{{ route('promosi.show', $promo->id) }}" class="border-t border-slate-100 py-3.5 text-center text-[13px] font-bold text-brand-600 hover:text-brand-700 hover:bg-brand-50 transition-colors flex items-center justify-center gap-1.5">
                            Lihat Detail <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-slate-200/80 shadow-sm p-8">
                        <div class="w-20 h-20 bg-brand-50 text-brand-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">Promosi Tidak Ditemukan</h3>
                        <p class="text-slate-500 max-w-md mx-auto mb-6 text-sm">
                            Maaf, kami tidak dapat menemukan produk yang sesuai dengan kata kunci pencarian Anda. Silakan coba kata kunci lain.
                        </p>
                        <a href="{{ route('promosi') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 text-white font-bold rounded-xl hover:bg-brand-700 transition shadow-md text-sm">
                            <i class="fa-solid fa-rotate-left"></i>
                            <span>Tampilkan Semua Promosi</span>
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Container -->
            @if ($promotions->count() > 0 && method_exists($promotions, 'links'))
                <div class="mt-12 flex justify-center">
                    {{ $promotions->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer id="kontak" class="bg-slate-950 text-white pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mb-12">
                <!-- Col 1: Brand -->
                <div class="space-y-4">
                    <a href="{{ route('landing') }}" class="inline-flex items-center group hover:scale-105 transition-transform">
                        <img src="{{ asset('images/logo.png') }}?v={{ time() }}" 
                             alt="FishNote Logo" 
                             class="h-10 w-auto object-contain">
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Platform pencatatan digital dan promosi hasil budidaya perikanan modern terintegrasi di Indonesia.
                    </p>
                    <div class="flex items-center space-x-3 pt-2">
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-brand-600 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-sky-500 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-pink-600 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-instagram text-sm"></i>
                        </a>
                    </div>
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

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        function setSearchFilter(term) {
            const form = document.querySelector('form[action="{{ route('promosi') }}"]');
            const input = form.querySelector('input[name="q"]');
            if (input && form) {
                input.value = term;
                form.submit();
            }
        }
    </script>
</body>

</html>
