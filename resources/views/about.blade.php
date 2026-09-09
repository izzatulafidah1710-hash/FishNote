<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - FishNote</title>
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

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: floatSlow 4s ease-in-out infinite; }
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
                        <a href="{{ route('artikel.index') }}" class="liquid-nav-link">Artikel</a>
                        <a href="{{ route('about') }}" class="liquid-nav-link liquid-nav-active">Tentang Kami</a>
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
            <a href="{{ route('about') }}" class="liquid-nav-link liquid-nav-active w-full text-left justify-start">Tentang Kami</a>
            <a href="#kontak" class="liquid-nav-link w-full text-left justify-start">Kontak</a>
            <div class="pt-3 border-t border-slate-100 flex flex-col space-y-2">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-bold text-brand-600 border border-brand-600/30 rounded-xl">Masuk</a>
                <a href="{{ route('register') }}" class="w-full text-center py-2.5 font-bold text-white bg-brand-600 rounded-xl shadow-md">Daftar Gratis</a>
            </div>
        </div>
    </nav>

    <!-- HERO SLIDER BANNER SECTION FOR ABOUT (Beranda Water-Blue Background Style + Interactive Slide Animation) -->
    <section class="relative pt-24 lg:pt-32 pb-16 overflow-hidden bg-gradient-to-b from-sky-100/80 via-blue-50/60 to-transparent text-slate-800">
        <!-- Soft Background Ambient Glow Orbs -->
        <div class="absolute top-10 left-1/4 w-[30rem] h-[30rem] bg-sky-300/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-[28rem] h-[28rem] bg-blue-200/50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center min-h-[420px]">
                
                <!-- Left Column Text Slides -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    
                    <!-- Hero Slide 1: Inovasi Perikanan Digital -->
                    <div class="hero-slide transition-all duration-500 transform translate-x-0 opacity-100 space-y-5">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                            Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600">FishNote Indonesia</span>
                        </h1>
                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                            Platform digital terdepan yang didedikasikan untuk modernisasi budidaya perikanan dan menghubungkan peternak ikan dengan pembeli di seluruh Indonesia.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                            <a href="#overview" class="w-full sm:w-auto px-8 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-xl shadow-brand-600/30 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-sm sm:text-base">
                                <span>Pelajari Ringkasan</span>
                                <i class="fa-solid fa-arrow-down text-xs"></i>
                            </a>
                            <a href="{{ route('promosi') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white hover:bg-slate-100 border border-slate-200 text-slate-800 font-bold rounded-2xl shadow-sm transition duration-200 text-center text-sm sm:text-base">
                                Jelajahi Promosi
                            </a>
                        </div>
                    </div>

                    <!-- Hero Slide 2: Visi & Misi Kami -->
                    <div class="hero-slide hidden transition-all duration-500 transform translate-x-4 opacity-0 space-y-5">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                            Mendorong Ekosistem <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-brand-600 to-blue-600">Budidaya Modern</span>
                        </h1>
                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                            Meningkatkan kesejahteraan peternak ikan lokal melalui pencatatan produksi transparan, pemantauan stok real-time, dan sarana promosi langsung bebas komisi.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                            <a href="#visi-misi" class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-600/30 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-sm sm:text-base">
                                <span>Lihat Visi Misi</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white hover:bg-slate-100 border border-slate-200 text-slate-800 font-bold rounded-2xl shadow-sm transition duration-200 text-center text-sm sm:text-base">
                                Daftar Gratis
                            </a>
                        </div>
                    </div>

                    <!-- Hero Slide 3: Dedikasi Tim Pengembang -->
                    <div class="hero-slide hidden transition-all duration-500 transform translate-x-4 opacity-0 space-y-5">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                            Dibuat Oleh <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 via-blue-600 to-brand-600">Talenta Lokal</span> Berbakat
                        </h1>
                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                            Tim developer & UI/UX designer berbakat yang berkomitmen menciptakan pengalaman digital terbaik bagi ekosistem perikanan di Indonesia.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                            <a href="#tim-kami" class="w-full sm:w-auto px-8 py-3.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-2xl shadow-xl shadow-sky-600/30 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-sm sm:text-base">
                                <span>Kenali Tim Kami</span>
                                <i class="fa-solid fa-users text-xs"></i>
                            </a>
                            <a href="#kontak" class="w-full sm:w-auto px-8 py-3.5 bg-white hover:bg-slate-100 border border-slate-200 text-slate-800 font-bold rounded-2xl shadow-sm transition duration-200 text-center text-sm sm:text-base">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>

                    <!-- Slide Navigation Dots (Hero Left/Center Bottom) -->
                    <div class="flex items-center justify-center lg:justify-start space-x-2.5 pt-4">
                        <button onclick="goToHeroSlide(0)" class="hero-dot w-8 h-2.5 bg-brand-600 rounded-full transition-all duration-300 shadow-md" aria-label="Hero Slide 1"></button>
                        <button onclick="goToHeroSlide(1)" class="hero-dot w-2.5 h-2.5 bg-slate-300 hover:bg-brand-400 rounded-full transition-all duration-300" aria-label="Hero Slide 2"></button>
                        <button onclick="goToHeroSlide(2)" class="hero-dot w-2.5 h-2.5 bg-slate-300 hover:bg-brand-400 rounded-full transition-all duration-300" aria-label="Hero Slide 3"></button>
                    </div>

                </div>

                <!-- Right Column Graphic (Blob Background + Logo Cutout + Floating Stat Cards like Beranda) -->
                <div class="lg:col-span-5 relative flex items-center justify-center min-h-[400px] py-6">
                    
                    <!-- Organic Soft Blue Fluid Blob Shape Background -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0">
                        <svg viewBox="0 0 500 500" class="w-[320px] h-[320px] sm:w-[420px] sm:h-[420px] text-sky-200/80 fill-current filter drop-shadow-lg">
                            <path d="M410,310Q370,370,310,410Q250,450,185,420Q120,390,85,325Q50,260,85,195Q120,130,185,90Q250,50,315,85Q380,120,410,185Q440,250,410,310Z" />
                        </svg>
                    </div>

                    <!-- Centered Logo Card Cutout -->
                    <div class="relative z-10 w-full max-w-[280px] sm:max-w-[320px] mx-auto flex justify-center">
                        <div class="text-center hover:scale-105 transition-transform duration-500">
                            <img src="{{ asset('images/logo.png') }}" alt="FishNote Logo" class="max-w-[200px] mx-auto drop-shadow-xl">
                        </div>
                    </div>

                    <!-- Floating White Glass Badge 1: Promosi (Top-Left) -->
                    <div class="animate-float absolute top-4 left-0 sm:-left-4 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 z-20 text-slate-800">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 text-brand-600 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <div>
                            <span class="text-base sm:text-lg font-black text-slate-900 block leading-none">50+</span>
                            <span class="text-[11px] text-slate-500 font-semibold">Promosi Aktif</span>
                        </div>
                    </div>

                    <!-- Floating White Glass Badge 2: Peternak (Top-Right) -->
                    <div class="animate-float absolute top-10 right-0 sm:-right-4 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 z-20 text-slate-800" style="animation-delay: 1.5s;">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-600 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <span class="text-base sm:text-lg font-black text-slate-900 block leading-none">500+</span>
                            <span class="text-[11px] text-slate-500 font-semibold">Mitra Peternak</span>
                        </div>
                    </div>

                    <!-- Floating White Glass Badge 3: Transaksi (Bottom-Right) -->
                    <div class="animate-float absolute bottom-2 right-2 sm:right-0 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 z-20 text-slate-800" style="animation-delay: 2.5s;">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <span class="text-base sm:text-lg font-black text-slate-900 block leading-none">10K+</span>
                            <span class="text-[11px] text-slate-500 font-semibold">Transaksi Terdaftar</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ABOUT OVERVIEW SECTION -->
    <section id="overview" class="py-16 lg:py-24 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Image Box -->
                <div class="relative">
                    <div class="bg-gradient-to-b from-transparent to-white/80 backdrop-blur-md p-8 sm:p-12 rounded-3xl border-b border-white/60 shadow-none flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent pointer-events-none"></div>
                        <img src="{{ asset('images/logo.png') }}" alt="FishNote Logo" class="max-w-xs mx-auto relative z-10 hover:scale-105 transition-transform duration-500">
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-6">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                        Mendukung Ekosistem Budidaya Ikan yang Modern & Efisien
                    </h2>
                    <p class="text-slate-600 leading-relaxed text-base">
                        <strong>FishNote</strong> lahir sebagai solusi digital terintegrasi yang memudahkan pembudidaya ikan dalam mencatat hasil panen, memantau riwayat produksi, sekaligus mempromosikan produk perikanan secara langsung kepada pembeli tanpa hambatan.
                    </p>
                    <p class="text-slate-600 leading-relaxed text-base">
                        Dengan fitur pencatatan transparan dan halaman promosi yang mudah diakses, kami membantu meningkatkan daya saing peternak lokal serta mempermudah konsumen mendapatkan pasokan produk ikan berkualitas.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI SECTION -->
    <section id="visi-misi" class="py-16 lg:py-24 bg-transparent relative overflow-hidden">
        <!-- Decorative Background Blobs for Glassmorphism -->
        <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-gradient-to-tr from-brand-200 to-indigo-100 rounded-full blur-3xl opacity-60 -z-10 translate-x-1/2 -translate-y-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tr from-sky-200 to-blue-100 rounded-full blur-3xl opacity-60 -z-10 -translate-x-1/2 translate-y-1/4"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">Visi & Misi Kami</h2>
                <p class="text-slate-600 text-base sm:text-lg">Prinsip utama yang menjadi pedoman penggerak FishNote dalam melayani ekosistem perikanan.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="card-lumilearn bg-gradient-to-b from-white/5 to-white/95 backdrop-blur-2xl p-10 sm:p-12 rounded-3xl border-b border-x border-white/60 border-t-0 shadow-xl shadow-brand-900/5 flex flex-col justify-center relative overflow-hidden text-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent pointer-events-none"></div>
                    <div class="relative z-10">
                        <h3 class="text-3xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-200/50 inline-block px-4">Visi Kami</h3>
                        <p class="text-slate-600 leading-relaxed text-base">
                            Menjadi platform digital terdepan yang memperdayakan ekosistem perikanan Indonesia, meningkatkan kesejahteraan peternak ikan lokal, dan menyediakan akses pasar yang adil dan transparan bagi seluruh masyarakat.
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="card-lumilearn bg-gradient-to-b from-white/5 to-white/95 backdrop-blur-2xl p-10 sm:p-12 rounded-3xl border-b border-x border-white/60 border-t-0 shadow-xl shadow-brand-900/5 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent pointer-events-none"></div>
                    <div class="relative z-10">
                    <div class="text-center">
                        <h3 class="text-3xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-200/50 inline-block px-4">Misi Kami</h3>
                    </div>
                    <ul class="space-y-4 text-slate-600 text-base">
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-blue-50 text-brand-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span>Memberdayakan peternak ikan melalui pencatatan produksi berbasis teknologi digital.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-blue-50 text-brand-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span>Menyediakan sarana promosi langsung dari lokasi pembudidaya kepada calon pembeli.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-blue-50 text-brand-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span>Meningkatkan efisiensi dan transparansi rantai pasok produk perikanan di Indonesia.</span>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section id="tim-kami" class="py-16 lg:py-24 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">Tim Di Balik FishNote</h2>
                <p class="text-slate-600 text-base sm:text-lg">Orang-orang berbakat yang membangun platform ini untuk kemajuan budidaya perikanan.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Anggota 1 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-1.jpeg') }}" alt="Aidil Ardiansyah" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">Aidil Ardiansyah</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">Project Manager</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Memimpin dan mengkoordinasikan proyek pengembangan platform agar berjalan sesuai rencana.
                    </p>
                </div>

                <!-- Anggota 2 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-5.jpeg') }}" alt="Izzatul Afidah" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">Izzatul Afidah</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">Analysis Manager</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Menganalisis data, meriset kebutuhan pengguna, serta menyusun strategi pengembangan produk.
                    </p>
                </div>

                <!-- Anggota 3 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-2.jpeg') }}" alt="Khairul Ikhsan" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">Khairul Ikhsan</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">AI Engineer</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Mengembangkan dan mengintegrasikan solusi kecerdasan buatan untuk mendukung fitur cerdas di platform.
                    </p>
                </div>

                <!-- Anggota 4 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-3.jpeg') }}" alt="M.Ferdi Fadhillah" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">M.Ferdi Fadhillah</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">Backend Developer</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Merancang arsitektur sistem backend dan logika database untuk memastikan performa pencatatan terpercaya.
                    </p>
                </div>

                <!-- Anggota 5 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-4.jpeg') }}" alt="M.Aidil Fitriansyah" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">M.Aidil Fitriansyah</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">Frontend Developer</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Pengembangan antarmuka publik dan dashboard modern dengan fokus pada kecepatan dan responsivitas.
                    </p>
                </div>

                <!-- Anggota 6 -->
                <div class="card-lumilearn bg-white/90 backdrop-blur-sm rounded-3xl border border-slate-200/80 overflow-hidden text-center p-6 flex flex-col items-center shadow-sm">
                    <div class="w-44 h-56 rounded-2xl overflow-hidden shadow-md mb-6 bg-slate-100 flex items-center justify-center text-slate-400">
                        <img src="{{ asset('images/tim-6.jpeg') }}" alt="Yuniarti Mulansari" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="fa-solid fa-user text-5xl hidden"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">Yuniarti Mulansari</h3>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-brand-700 text-xs font-bold rounded-full mb-3">UI/UX Designer</span>
                    <p class="text-slate-500 text-xs leading-relaxed mb-6">
                        Bertanggung jawab atas riset pengalaman pengguna serta antarmuka intuitif bagi peternak dan pengunjung.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- BECOME A PROMOTER BANNER SLIDER (Pond Background Photo + Interactive Slide Animation) -->
    <section class="py-12 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative min-h-[340px] flex flex-col justify-between py-12 text-slate-900">
                <!-- Faded Background Image (Fades out at the edges to blend perfectly) -->
                <div class="absolute inset-0 bg-cover bg-center opacity-30 pointer-events-none z-0" 
                     style="background-image: url('{{ asset('template/img/bg3.jpg') }}'); 
                            filter: blur(4px);
                            -webkit-mask-image: radial-gradient(50% 50% at 50% 50%, black 50%, transparent 100%);
                            mask-image: radial-gradient(50% 50% at 50% 50%, black 50%, transparent 100%);">
                </div>

                <!-- Slide Content Container -->
                <div class="relative z-10 my-auto min-h-[160px] flex items-center">
                    
                    <!-- Slide 1 -->
                    <div class="banner-slide transition-all duration-500 transform translate-x-0 opacity-100 space-y-4 max-w-3xl">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Ingin Memasarkan Hasil Panen Anda ke <span class="text-brand-600">Ribuan Pembeli?</span>
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl font-normal">
                            Daftar gratis sebagai peternak di FishNote, catat perkembangan kolam Anda, dan publikasikan promosi ikan panen langsung tanpa dipungut biaya komisi.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-brand-600 text-white font-extrabold rounded-2xl hover:bg-brand-700 transition shadow-lg shadow-brand-600/30 text-sm sm:text-base hover:scale-105">
                                <span>Daftar Sebagai Peternak Sekarang</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="banner-slide hidden transition-all duration-500 transform translate-x-4 opacity-0 space-y-4 max-w-3xl">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Pencatatan Panen & Operasional <span class="text-brand-600">Kolam Mudah</span>
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl font-normal">
                            Pantau stok pakan, siklus tebar bibit, dan hasil perkiraan tonase panen secara real-time langsung dari smartphone Anda.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('promosi') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-brand-600 text-white font-extrabold rounded-2xl hover:bg-brand-700 transition shadow-lg shadow-brand-600/30 text-sm sm:text-base hover:scale-105">
                                <span>Jelajahi Promosi</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Slide Indicator Dots (Center Bottom) -->
                <div class="relative z-10 flex items-center justify-center space-x-2.5 pt-6">
                    <button onclick="goToBannerSlide(0)" class="banner-dot w-8 h-2.5 bg-brand-600 rounded-full transition-all duration-300 shadow-sm" aria-label="Slide 1"></button>
                    <button onclick="goToBannerSlide(1)" class="banner-dot w-2.5 h-2.5 bg-brand-600/30 hover:bg-brand-600/60 rounded-full transition-all duration-300" aria-label="Slide 2"></button>
                </div>

            </div>
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

        // Hero Slider Interactive Logic
        let currentHeroSlide = 0;
        let heroTimer = null;

        function goToHeroSlide(index) {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.hero-dot');
            if (!slides.length) return;

            currentHeroSlide = (index + slides.length) % slides.length;

            slides.forEach((slide, idx) => {
                if (idx === currentHeroSlide) {
                    slide.classList.remove('hidden');
                    setTimeout(() => {
                        slide.classList.remove('translate-x-4', 'opacity-0');
                        slide.classList.add('translate-x-0', 'opacity-100');
                    }, 50);
                } else {
                    slide.classList.add('translate-x-4', 'opacity-0');
                    slide.classList.remove('translate-x-0', 'opacity-100');
                    slide.classList.add('hidden');
                }
            });

            if (dots.length) {
                dots.forEach((dot, idx) => {
                    if (idx === currentHeroSlide) {
                        dot.className = 'hero-dot w-8 h-2.5 bg-brand-600 rounded-full transition-all duration-300 shadow-md';
                    } else {
                        dot.className = 'hero-dot w-2.5 h-2.5 bg-slate-300 hover:bg-brand-400 rounded-full transition-all duration-300';
                    }
                });
            }

            if (heroTimer) clearInterval(heroTimer);
            heroTimer = setInterval(() => {
                goToHeroSlide(currentHeroSlide + 1);
            }, 5000);
        }

        // Banner Slider Interactive Logic
        let currentBannerSlide = 0;
        let bannerTimer = null;

        function goToBannerSlide(index) {
            const slides = document.querySelectorAll('.banner-slide');
            const dots = document.querySelectorAll('.banner-dot');
            if (!slides.length) return;

            currentBannerSlide = (index + slides.length) % slides.length;

            slides.forEach((slide, idx) => {
                if (idx === currentBannerSlide) {
                    slide.classList.remove('hidden');
                    setTimeout(() => {
                        slide.classList.remove('translate-x-4', 'opacity-0');
                        slide.classList.add('translate-x-0', 'opacity-100');
                    }, 50);
                } else {
                    slide.classList.add('translate-x-4', 'opacity-0');
                    slide.classList.remove('translate-x-0', 'opacity-100');
                    slide.classList.add('hidden');
                }
            });

            if (dots.length) {
                dots.forEach((dot, idx) => {
                    if (idx === currentBannerSlide) {
                        dot.className = 'banner-dot w-8 h-2.5 bg-brand-600 rounded-full transition-all duration-300 shadow-sm';
                    } else {
                        dot.className = 'banner-dot w-2.5 h-2.5 bg-brand-600/30 hover:bg-brand-600/60 rounded-full transition-all duration-300';
                    }
                });
            }

            if (bannerTimer) clearInterval(bannerTimer);
            bannerTimer = setInterval(() => {
                goToBannerSlide(currentBannerSlide + 1);
            }, 4500);
        }

        document.addEventListener('DOMContentLoaded', () => {
            goToHeroSlide(0);
            goToBannerSlide(0);
        });
    </script>
</body>

</html>
