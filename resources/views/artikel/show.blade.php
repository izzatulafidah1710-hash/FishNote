<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article['title'] }} - Artikel FishNote</title>
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
                        <a href="{{ route('promosi') }}" class="liquid-nav-link">Promosi</a>
                        <a href="{{ route('artikel.index') }}" class="liquid-nav-link liquid-nav-active">Artikel</a>
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
            <a href="{{ route('promosi') }}" class="liquid-nav-link w-full text-left justify-start">Promosi</a>
            <a href="{{ route('artikel.index') }}" class="liquid-nav-link w-full text-left justify-start">Artikel</a>
            <a href="{{ route('about') }}" class="liquid-nav-link w-full text-left justify-start">Tentang Kami</a>
            <a href="#kontak" class="liquid-nav-link w-full text-left justify-start">Kontak</a>
            <div class="pt-3 border-t border-slate-100 flex flex-col space-y-2">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-bold text-brand-600 border border-brand-600/30 rounded-xl">Masuk</a>
                <a href="{{ route('register') }}" class="w-full text-center py-2.5 font-bold text-white bg-brand-600 rounded-xl shadow-md">Daftar Gratis</a>
            </div>
        </div>
    </nav>

    <!-- ARTICLE DETAIL CONTENT -->
    <main class="py-16 lg:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('landing') }}" class="inline-flex items-center text-brand-600 hover:text-brand-700 font-bold mb-8 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
            
            <article class="bg-white rounded-3xl border border-slate-200/80 shadow-xl overflow-hidden">
                <div class="h-64 sm:h-96 w-full relative">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover">
                    <div class="absolute top-6 left-6 z-10">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur-sm text-brand-700 text-xs font-extrabold uppercase tracking-wider rounded-lg shadow-sm">{{ $article['category'] }}</span>
                    </div>
                </div>
                
                <div class="p-8 sm:p-12">
                    <div class="flex items-center gap-4 text-xs sm:text-sm text-slate-500 font-semibold mb-6">
                        <span class="flex items-center gap-2"><i class="fa-regular fa-calendar"></i> {{ $article['date'] }}</span>
                        <span class="hidden sm:inline">•</span>
                        <span class="flex items-center gap-2"><i class="fa-regular fa-clock"></i> {{ $article['read_time'] }}</span>
                        <span class="hidden sm:inline">•</span>
                        <span class="flex items-center gap-2"><i class="fa-regular fa-user"></i> Ditulis oleh {{ $article['author'] }}</span>
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight mb-8">
                        {{ $article['title'] }}
                    </h1>
                    
                    <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed space-y-6">
                        {!! $article['content'] !!}
                    </div>
                    
                    <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex gap-3 text-lg">
                            <span class="text-sm font-bold text-slate-700 mr-2 mt-1">Bagikan:</span>
                            <a href="#" class="text-slate-400 hover:text-brand-600 transition-colors"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="text-slate-400 hover:text-sky-500 transition-colors"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="text-slate-400 hover:text-emerald-500 transition-colors"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

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
    </script>
</body>
</html>
