<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FishNote - Platform Budidaya Perikanan Indonesia</title>
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

        @keyframes blob-morph {
            0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
            100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        }
        .blob-img {
            animation: blob-morph 10s ease-in-out infinite;
            -webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 95%);
            mask-image: radial-gradient(ellipse at center, black 50%, transparent 95%);
        }

        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: fit-content;
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }

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

        /* === STAT CARD ANIMATIONS === */
        @keyframes floatCard1 {
            0%   { transform: translateY(0px) rotate(-1.5deg); }
            50%  { transform: translateY(-14px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(-1.5deg); }
        }
        @keyframes floatCard2 {
            0%   { transform: translateY(0px) rotate(1.5deg); }
            50%  { transform: translateY(-10px) rotate(-1deg); }
            100% { transform: translateY(0px) rotate(1.5deg); }
        }
        @keyframes floatCard3 {
            0%   { transform: translateY(0px); }
            50%  { transform: translateY(-12px); }
            100% { transform: translateY(0px); }
        }
        @keyframes fadeSlideIn {
            from { opacity: 0; transform: translateY(16px) scale(0.92); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes glowPulse {
            0%, 100% { box-shadow: 0 6px 20px -4px rgba(37,99,235,0.15), 0 2px 6px rgba(0,0,0,0.06); }
            50%       { box-shadow: 0 14px 34px -4px rgba(37,99,235,0.28), 0 4px 10px rgba(0,0,0,0.08); }
        }
        .animate-float     { animation: floatCard1 4s ease-in-out infinite, glowPulse 3s ease-in-out infinite; }
        .animate-float-med { animation: floatCard2 3.4s ease-in-out infinite, glowPulse 3s ease-in-out infinite; }

        /* Stat floating card */
        .stat-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 1.5rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: absolute;
            z-index: 20;
            min-width: 150px;
            cursor: default;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.15), inset 0 1px 0 rgba(255,255,255,0.8);
        }
        .stat-card:hover {
            transform: scale(1.08) translateY(-6px) !important;
            box-shadow: 0 20px 40px -10px rgba(37, 99, 235, 0.25), inset 0 1px 0 rgba(255,255,255,1) !important;
            background: rgba(255, 255, 255, 0.95);
        }
        .stat-card i {
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .stat-card:hover i {
            transform: scale(1.25) rotate(5deg);
        }

        .star-rating i {
            cursor: pointer;
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .star-rating i:hover, .star-rating i.active {
            color: #f59e0b;
            transform: scale(1.15);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-sky-100/90 via-blue-50/50 to-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen">

    <!-- NAVBAR (LumiLearn Clean White Style in Ocean Blue Theme with Liquid Glass Nav Links) -->
    <nav class="glass-nav border-b border-slate-100 fixed top-0 left-0 right-0 z-50 transition-all duration-300">
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
                        <a href="{{ route('landing') }}" class="liquid-nav-link liquid-nav-active">Beranda</a>
                        <a href="{{ route('promosi') }}" class="liquid-nav-link">Promosi</a>
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
                        @guest
                            <a href="{{ route('login') }}" class="px-6 py-2 border-2 border-brand-600 text-brand-600 font-bold text-sm hover:bg-brand-50 rounded-full transition duration-200">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm rounded-full shadow-lg shadow-brand-600/25 hover:shadow-brand-600/40 hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                                <span>Daftar Gratis</span>
                            </a>
                        @else
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2 text-sm font-medium text-slate-700 bg-slate-50 px-3 py-1.5 rounded-full border border-slate-200">
                                    <div class="w-6 h-6 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold text-xs">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <span class="hidden lg:inline-block font-bold">{{ explode(' ', Auth::user()->name)[0] }}</span>
                                </div>
                                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm rounded-full shadow-md hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                                </a>
                            </div>
                        @endguest
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
            <a href="{{ route('landing') }}" class="liquid-nav-link liquid-nav-active w-full text-left justify-start">Beranda</a>
            <a href="{{ route('promosi') }}" class="liquid-nav-link w-full text-left justify-start">Promosi</a>
            <a href="{{ route('artikel.index') }}" class="liquid-nav-link w-full text-left justify-start">Artikel</a>
            <a href="{{ route('about') }}" class="liquid-nav-link w-full text-left justify-start">Tentang Kami</a>
            <a href="#kontak" class="liquid-nav-link w-full text-left justify-start">Kontak</a>
            <div class="pt-3 border-t border-slate-100 flex flex-col space-y-2">
                @guest
                    <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-bold text-brand-600 border border-brand-600/30 rounded-xl">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center py-2.5 font-bold text-white bg-brand-600 rounded-xl shadow-md">Daftar Gratis</a>
                @else
                    <div class="flex items-center gap-3 px-3 py-3 bg-slate-50 rounded-xl border border-slate-100 mb-2">
                        <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold text-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-slate-800 text-sm">{{ Auth::user()->name }}</span>
                            <span class="text-xs text-slate-500">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="w-full text-center py-2.5 font-bold text-white bg-brand-600 rounded-xl shadow-md">
                        <i class="fa-solid fa-gauge-high mr-2"></i> Kembali ke Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- HERO SECTION (Clean Light Ocean-Blue Modern SaaS Hero with Isolated Cutout) -->
    <section id="beranda" class="relative pt-28 lg:pt-36 pb-20 overflow-hidden bg-gradient-to-b from-sky-100/80 via-blue-50/60 to-transparent text-slate-800">
        <!-- Soft Background Ambient Glows -->
        <div class="absolute top-10 left-1/4 w-[30rem] h-[30rem] bg-sky-300/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-[28rem] h-[28rem] bg-blue-200/50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Column Text -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <!-- Main Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                        Kelola & Pasarkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600">Budidaya Ikan</span> Dengan Cara Baru
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                        Platform digital yang membantu peternak ikan lokal mencatat panen, memantau operasional kolam, dan mempromosikan hasil perikanan secara langsung kepada pembeli.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-xl shadow-brand-600/30 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-base">
                            <span>Mulai Sekarang - Gratis</span>
                        </a>
                        <a href="{{ route('promosi') }}" class="w-full sm:w-auto px-8 py-4 bg-white hover:bg-slate-100 border border-slate-200 text-slate-800 font-bold rounded-2xl shadow-sm transition duration-200 text-center text-base">
                            Jelajahi Promosi
                        </a>
                    </div>
                </div>

                <!-- Right Column: Person Cutout + Organic Blue Blob Background + Floating White Glass Badges -->
                <div class="lg:col-span-5 relative flex items-center justify-center min-h-[480px] py-6">
                    
                    <!-- Custom Network Nodes Background (from Screenshot) -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0">
                        <!-- Soft White/Blue Blob at bottom -->
                        <div class="absolute w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] bg-sky-100/70 rounded-[40%_60%_70%_30%/40%_50%_60%_50%] bottom-0 -z-10 translate-y-10 filter blur-[2px]"></div>
                        
                        <!-- SVG Network Lines -->
                        <svg class="absolute inset-0 w-full h-full text-slate-400 opacity-60" viewBox="0 0 500 500" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M120 220 L250 160 L380 200 L420 120" />
                            <path d="M250 160 L180 100 L120 220" />
                            <path d="M380 200 L450 280 L250 160" />
                            <path d="M120 220 L80 320" />
                            <path d="M80 320 L150 400" />
                        </svg>

                        <!-- Floating Nodes (Circles) -->
                        <div class="absolute w-full h-full">
                            <!-- Node: List (Top Left) -->
                            <div class="absolute top-[20%] left-[25%] w-10 h-10 bg-white rounded-full border-2 border-slate-300 shadow-sm flex items-center justify-center text-slate-600 animate-float" style="animation-delay: 1.5s;">
                                <i class="fa-solid fa-list-check text-sm"></i>
                            </div>

                            <!-- Node: Briefcase (Top Right) -->
                            <div class="absolute top-[25%] right-[20%] w-10 h-10 bg-white rounded-full border-2 border-slate-300 shadow-sm flex items-center justify-center text-slate-600 animate-float" style="animation-delay: 2.5s;">
                                <i class="fa-solid fa-briefcase text-sm"></i>
                            </div>
                            <!-- Small Dot Nodes -->
                            <div class="absolute top-[18%] left-[40%] w-3 h-3 bg-slate-300 rounded-full animate-pulse"></div>
                            <div class="absolute top-[22%] right-[10%] w-3 h-3 bg-slate-300 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                            <div class="absolute top-[40%] right-[5%] w-4 h-4 bg-slate-300 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
                            <div class="absolute bottom-[30%] left-[10%] w-4 h-4 bg-slate-300 rounded-full animate-pulse" style="animation-delay: 1.5s;"></div>
                        </div>
                    </div>

                    <!-- Isolated Subject Cutout (Person with Tablet) -->
                    <div class="relative z-10 w-full max-w-[320px] sm:max-w-[380px] mx-auto flex justify-center">
                        <img src="{{ asset('images/farmer_tablet_cutout.png') }}?v={{ time() }}" 
                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';"
                             alt="Peternak FishNote" 
                             class="w-full h-auto max-h-[480px] object-contain hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
                    </div>

                    <!-- Floating Card 1: Efisiensi Panen (Top Left) -->
                    <div class="stat-card animate-float top-4 left-0 sm:-left-8" style="animation-delay: 0s;">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg flex-shrink-0" style="background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd;">
                            <i class="fa-solid fa-stopwatch"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-black text-slate-800 tracking-tight leading-none mb-1">75%</span>
                            <span class="text-[11px] text-slate-500 font-semibold tracking-wide">Efisiensi Panen</span>
                        </div>
                    </div>

                    <!-- Floating Card 2: Peternak Aktif (Top Right) -->
                    <div class="stat-card animate-float-med top-4 right-0 sm:-right-8" style="animation-delay: 0.8s;">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg flex-shrink-0" style="background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0;">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-black text-slate-800 tracking-tight leading-none mb-1">500+</span>
                            <span class="text-[11px] text-slate-500 font-semibold tracking-wide">Peternak Aktif</span>
                        </div>
                    </div>

                    <!-- Floating Card 3: Keuntungan (Middle Left) -->
                    <div class="stat-card animate-float top-1/3 left-0 sm:-left-12" style="animation-delay: 1.6s;">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg flex-shrink-0" style="background: #fdf2f8; color: #db2777; border: 1px solid #fbcfe8;">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-black text-slate-800 tracking-tight leading-none mb-1">+20%</span>
                            <span class="text-[11px] text-slate-500 font-semibold tracking-wide">Keuntungan</span>
                        </div>
                    </div>

                    <!-- Floating Card 4: Total Kolam (Bottom Left) -->
                    <div class="stat-card animate-float-med bottom-12 left-4 sm:-left-4" style="animation-delay: 2.4s;">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg flex-shrink-0" style="background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe;">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[13px] font-black text-slate-800 tracking-tight leading-tight">Total Kolam<br>Terkelola</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- WHY CHOOSE FISHNOTE SECTION (Text Slider) -->
    <section class="py-20 bg-transparent overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-xs font-extrabold text-brand-600 uppercase tracking-widest">Keunggulan Platform</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Mengapa Memilih FishNote?</h2>
            </div>
            
            <div class="relative bg-gradient-to-b from-transparent to-white/80 backdrop-blur-md border-b border-white/60 shadow-none rounded-[3rem] p-8 sm:p-12 lg:p-16 overflow-hidden">
                <div class="relative min-h-[450px] lg:min-h-[400px] flex items-center justify-start text-left">
                    
                    <!-- Benefit 1 -->
                    <div class="benefit-slide absolute inset-0 transition-all duration-700 transform translate-x-0 opacity-100 flex items-center">
                        <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                            <!-- Left: Text -->
                            <div class="pr-0 lg:pr-8">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">Pencatatan Panen Akurat</h3>
                                <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-normal mb-10">
                                    Tinggalkan cara lama mencatat di buku yang mudah hilang. Dengan sistem terintegrasi kami, Anda bisa mendokumentasikan setiap siklus kolam, riwayat pemberian pakan harian, hingga kalkulasi tonase panen secara akurat. Semua data tersimpan dengan aman di cloud dan dapat diakses kapan saja dari perangkat apa pun.
                                </p>
                                <a href="{{ route('register') }}" class="inline-flex bg-brand-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-brand-700 transition shadow-lg shadow-brand-600/30">Coba Sekarang</a>
                            </div>
                            <!-- Right: Image -->
                            <div class="relative h-64 lg:h-96 w-full hidden lg:flex items-center justify-center p-6">
                                <div class="absolute inset-0 bg-brand-50/40 rounded-full blur-3xl"></div>
                                <img src="{{ asset('template/img/bg1.jpg') }}" alt="Pencatatan Data" class="object-cover w-full h-full blob-img relative z-10 shadow-2xl">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Benefit 2 -->
                    <div class="benefit-slide absolute inset-0 transition-all duration-700 transform translate-x-4 opacity-0 hidden flex items-center">
                        <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                            <div class="pr-0 lg:pr-8">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">Promosi Langsung WA</h3>
                                <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-normal mb-10">
                                    Tidak perlu lagi bergantung pada tengkulak. Pembeli dari berbagai daerah dapat melihat katalog ikan Anda dan langsung menghubungi Anda melalui tombol WhatsApp yang tersedia. Transaksi terjadi secara mandiri, tanpa campur tangan pihak ketiga, dan tanpa potongan biaya perantara sepeserpun.
                                </p>
                                <a href="{{ route('promosi') }}" class="inline-flex bg-brand-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-brand-700 transition shadow-lg shadow-brand-600/30">Jelajahi Promosi</a>
                            </div>
                            <div class="relative h-64 lg:h-96 w-full hidden lg:flex items-center justify-center">
                                <div class="absolute w-64 h-64 bg-[#25D366]/20 blur-3xl rounded-full mix-blend-multiply opacity-60"></div>
                                <i class="fa-brands fa-whatsapp text-[#25D366] relative z-10 drop-shadow-2xl hover:scale-110 transition-transform duration-700" style="font-size: 14rem;"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Benefit 3 -->
                    <div class="benefit-slide absolute inset-0 transition-all duration-700 transform translate-x-4 opacity-0 hidden flex items-center">
                        <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                            <div class="pr-0 lg:pr-8">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">Harga Transparan</h3>
                                <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-normal mb-10">
                                    Ciptakan ekosistem pasar yang lebih sehat dengan keterbukaan informasi. Calon pembeli dapat melihat ketersediaan stok secara real-time dan patokan harga transparan langsung dari lokasi pembudidaya. Ini membantu meningkatkan kepercayaan konsumen dan meningkatkan daya saing produk perikanan lokal Anda.
                                </p>
                                <a href="{{ route('register') }}" class="inline-flex bg-brand-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-brand-700 transition shadow-lg shadow-brand-600/30">Daftar Gratis</a>
                            </div>
                            <div class="relative h-64 lg:h-96 w-full hidden lg:flex items-center justify-center p-6">
                                <div class="absolute inset-0 bg-brand-50/40 rounded-full blur-3xl"></div>
                                <img src="{{ asset('template/img/bg2.jpg') }}" alt="Harga Transparan" class="object-cover w-full h-full blob-img relative z-10 shadow-2xl">
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 4 -->
                    <div class="benefit-slide absolute inset-0 transition-all duration-700 transform translate-x-4 opacity-0 hidden flex items-center">
                        <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                            <div class="pr-0 lg:pr-8">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">Platform 100% Gratis</h3>
                                <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-normal mb-10">
                                    Kami berkomitmen untuk memajukan industri perikanan Indonesia tanpa membebani para peternak. Anda dapat mendaftar, mengelola data operasional tambak, dan mempublikasikan promosi hasil panen Anda kepada ribuan calon pembeli sepenuhnya gratis tanpa biaya pendaftaran atau langganan bulanan.
                                </p>
                                <a href="{{ route('register') }}" class="inline-flex bg-brand-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-brand-700 transition shadow-lg shadow-brand-600/30">Gabung Sekarang</a>
                            </div>
                            <div class="relative h-64 lg:h-96 w-full hidden lg:flex items-center justify-center p-6">
                                <div class="absolute inset-0 bg-brand-50/40 rounded-full blur-3xl"></div>
                                <img src="{{ asset('template/img/catfish_feeding.png') }}" alt="Peternak Ikan" class="object-cover w-full h-full blob-img relative z-10 shadow-2xl">
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </section>

    <!-- POPULAR PROMOTION SHOWCASE SECTION -->
    <section id="promosi" class="py-20 bg-gradient-to-b from-blue-50/40 via-slate-50/70 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-extrabold text-brand-600 uppercase tracking-widest">Katalog Perikanan</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Promosi Hasil Panen Terbaru</h2>
                </div>
                <a href="{{ route('promosi') }}" class="mt-4 sm:mt-0 text-brand-600 font-bold hover:text-brand-700 text-sm flex items-center gap-2 group">
                    <span>Lihat Semua Promosi</span>
                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- PROMOTION GRID -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($promotions as $index => $promo)
                    <div class="bg-white rounded-none border border-slate-200/80 overflow-hidden card-lumilearn flex flex-col group">
                        
                        <!-- Image Container -->
                        <div class="relative h-48 bg-slate-100 overflow-hidden">
                            @if ($promo->foto)
                                <img src="{{ asset('storage/' . $promo->foto) }}" alt="{{ $promo->jenis_ikan }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-fish text-5xl"></i>
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
                            <p class="text-slate-500 text-xs line-clamp-2 mb-5 leading-relaxed">
                                {{ $promo->deskripsi ?: 'Produk hasil panen perikanan segar dari pembudidaya lokal terpercaya.' }}
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
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                        <div class="w-16 h-16 bg-brand-50 text-brand-600 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">Belum Ada Promosi Tayang</h3>
                        <p class="text-slate-500 text-xs mb-4">Jadilah peternak pertama yang memasarkan produk perikanan di FishNote!</p>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-brand-600 text-white font-bold text-xs rounded-xl inline-block shadow-md">
                            Daftar Peternak Sekarang
                        </a>
                    </div>
                @endforelse
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

    <!-- ARTIKEL & BLOG TERBARU SECTION -->
    <section id="artikel" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-extrabold text-brand-600 uppercase tracking-widest">Edukasi & Tips</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Artikel Terbaru FishNote</h2>
                    <p class="text-slate-500 text-sm mt-2 max-w-2xl">Baca panduan terbaru seputar budidaya ikan, tips menjaga kualitas air, dan strategi pemasaran hasil panen.</p>
                </div>
                <a href="{{ route('artikel.index') }}" class="mt-4 sm:mt-0 text-brand-600 font-bold hover:text-brand-700 text-sm flex items-center gap-2 group">
                    <span>Lihat Semua Artikel</span>
                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Grid Artikel -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Artikel 1 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'cara-efektif-menjaga-kualitas-air') }}" class="block w-full h-full">
                            <img src="{{ asset('template/img/nila.jpg') }}" alt="Kolam Ikan Nila" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 12 Sep 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 5 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-brand-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'cara-efektif-menjaga-kualitas-air') }}">Cara Efektif Menjaga Kualitas Air Kolam Nila Agar Ikan Cepat Besar</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Kualitas air adalah kunci sukses budidaya ikan nila. Pelajari cara mengukur pH, mengatur sirkulasi, dan menjaga kadar oksigen tetap optimal di segala cuaca.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'cara-efektif-menjaga-kualitas-air') }}" class="text-brand-600 hover:text-brand-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 2 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'strategi-pemberian-pakan-lele') }}" class="block w-full h-full">
                            <img src="{{ asset('template/img/catfish_feeding.png') }}" alt="Pemberian Pakan Ikan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 05 Sep 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 4 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'strategi-pemberian-pakan-lele') }}">Strategi Pemberian Pakan Lele untuk Menekan FCR dan Menghemat Biaya</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Menekan biaya pakan (FCR) sangat penting dalam budidaya lele. Simak takaran pakan ideal dan alternatif pakan tambahan untuk memaksimalkan keuntungan Anda.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'strategi-pemberian-pakan-lele') }}" class="text-emerald-600 hover:text-emerald-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 3 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'menjual-hasil-panen-langsung') }}" class="block w-full h-full">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Transaksi Pasar Ikan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 28 Agu 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 6 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'menjual-hasil-panen-langsung') }}">Cara Menjual Hasil Panen Langsung ke Pembeli dengan FishNote</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Bosan dengan tengkulak? Inilah saatnya Anda mengontrol harga jual hasil panen. Pelajari cara membuat promosi menarik di FishNote yang langsung dilirik restoran dan pasar.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'menjual-hasil-panen-langsung') }}" class="text-indigo-600 hover:text-indigo-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 4 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'pemilihan-bibit-unggul') }}" class="block w-full h-full">
                            <img src="{{ asset('template/img/lele.jpg') }}" alt="Bibit Ikan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 20 Agu 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 4 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-brand-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'pemilihan-bibit-unggul') }}">Tips Memilih Bibit Unggul untuk Panen Maksimal</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Memulai dengan bibit yang tepat adalah setengah dari keberhasilan. Pahami ciri-ciri fisik bibit unggul dan tahan penyakit sebelum menebarnya di kolam Anda.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'pemilihan-bibit-unggul') }}" class="text-brand-600 hover:text-brand-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 5 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'mencegah-penyakit-ikan') }}" class="block w-full h-full">
                            <img src="{{ asset('template/img/patin.jpg') }}" alt="Ikan Sehat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 15 Agu 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 5 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-brand-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'mencegah-penyakit-ikan') }}">Mencegah Wabah Penyakit di Musim Penghujan</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Perubahan cuaca drastis sangat rawan bagi ikan. Simak langkah-langkah preventif pemberian vitamin dan penyesuaian pakan saat musim hujan tiba.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'mencegah-penyakit-ikan') }}" class="text-brand-600 hover:text-brand-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 6 -->
                <article class="bg-white rounded-none border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-lumilearn group flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                        <a href="{{ route('artikel.show', 'sistem-bioflok-modern') }}" class="block w-full h-full">
                            <img src="{{ asset('template/img/gurame.jpg') }}" alt="Sistem Bioflok" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 text-[11px] text-slate-500 font-semibold mb-3">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> 02 Agu 2026</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 7 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-brand-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', 'sistem-bioflok-modern') }}">Mengenal Sistem Bioflok: Hemat Pakan, Lahan Minim</a>
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-3">
                            Punya lahan terbatas tapi ingin panen melimpah? Sistem bioflok bisa jadi solusinya. Ketahui cara kerja dan persiapan awal membuat kolam bioflok Anda sendiri.
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-end">
                            <a href="{{ route('artikel.show', 'sistem-bioflok-modern') }}" class="text-brand-600 hover:text-brand-700 font-bold text-xs">Baca Artikel &rarr;</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- TESTIMONI & MANUAL RATING SECTION (LumiLearn Style) -->
    <section class="py-20 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-extrabold text-brand-600 uppercase tracking-widest">Ulasan Pengunjung</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Apa Kata Peternak & Pembeli</h2>
                </div>
                <button onclick="openRatingModal()" class="mt-4 sm:mt-0 px-6 py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-lg shadow-brand-600/30 hover:scale-105 transition flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-star text-amber-300"></i>
                    <span>+ Beri Ulasan & Rating</span>
                </button>
            </div>
            <!-- Filter Ulasan -->
            <div class="mb-8 flex flex-wrap items-center gap-2 sm:gap-3">
                <button onclick="setReviewFilter('semua')" id="btnFilter-semua" class="filter-btn px-4 py-2 bg-brand-600 text-white rounded-full text-[11px] sm:text-xs font-bold transition">Semua</button>
                <button onclick="setReviewFilter('baik')" id="btnFilter-baik" class="filter-btn px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition">Penilaian Baik (4-5)</button>
                <button onclick="setReviewFilter('buruk')" id="btnFilter-buruk" class="filter-btn px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition">Penilaian Buruk (1-3)</button>
                <div class="hidden sm:block h-6 w-px bg-slate-200 mx-1"></div>
                <button onclick="setReviewFilter(5)" id="btnFilter-5" class="filter-btn px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition flex items-center gap-1.5"><i class="fa-solid fa-star text-amber-400"></i> 5</button>
                <button onclick="setReviewFilter(4)" id="btnFilter-4" class="filter-btn px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition flex items-center gap-1.5"><i class="fa-solid fa-star text-amber-400"></i> 4</button>
                <button onclick="setReviewFilter(3)" id="btnFilter-3" class="filter-btn px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition flex items-center gap-1.5"><i class="fa-solid fa-star text-amber-400"></i> 3</button>
                <button onclick="setReviewFilter(2)" id="btnFilter-2" class="filter-btn px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition flex items-center gap-1.5"><i class="fa-solid fa-star text-amber-400"></i> 2</button>
                <button onclick="setReviewFilter(1)" id="btnFilter-1" class="filter-btn px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full text-[11px] sm:text-xs font-bold transition flex items-center gap-1.5"><i class="fa-solid fa-star text-amber-400"></i> 1</button>
            </div>

            <!-- Grid Testimoni -->
            <div id="testimonialGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <!-- Testimonials injected via JS -->
            </div>
        </div>
    </section>

    <!-- MODAL INPUT RATING MANUAL INTERAKTIF -->
    <div id="ratingModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
            <button onclick="closeRatingModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 p-2">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <div class="text-center mb-6">
                <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-3">
                    <i class="fa-solid fa-star"></i>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900">Beri Ulasan & Rating</h3>
                <p class="text-slate-500 text-xs">Bagikan pengalaman Anda menggunakan platform FishNote</p>
            </div>

            <form id="ratingForm" onsubmit="submitRating(event)" class="space-y-4">
                <div class="text-center mb-4">
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Pilih Bintang Rating</label>
                    <div class="star-rating flex items-center justify-center space-x-2 text-3xl text-slate-300">
                        <i class="fa-solid fa-star" onclick="setRating(1)" onmouseenter="highlightStars(1)" onmouseleave="resetStars()"></i>
                        <i class="fa-solid fa-star" onclick="setRating(2)" onmouseenter="highlightStars(2)" onmouseleave="resetStars()"></i>
                        <i class="fa-solid fa-star" onclick="setRating(3)" onmouseenter="highlightStars(3)" onmouseleave="resetStars()"></i>
                        <i class="fa-solid fa-star" onclick="setRating(4)" onmouseenter="highlightStars(4)" onmouseleave="resetStars()"></i>
                        <i class="fa-solid fa-star" onclick="setRating(5)" onmouseenter="highlightStars(5)" onmouseleave="resetStars()"></i>
                    </div>
                    <input type="hidden" id="selectedRating" value="5" required>
                    <span id="ratingText" class="text-xs font-bold text-amber-500 mt-1 block">5.0 / 5.0 (Sangat Bagus!)</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" id="reviewerName" required placeholder="Contoh: Aidil Ardiansyah"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Profesi & Lokasi <span class="text-rose-500">*</span></label>
                    <input type="text" id="reviewerRole" required placeholder="Contoh: Pembudidaya Lele - Bengkalis"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ulasan / Testimoni <span class="text-rose-500">*</span></label>
                    <textarea id="reviewerMessage" rows="3" required placeholder="Tuliskan pendapat Anda tentang layanan FishNote..."
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl shadow-lg shadow-brand-600/30 transition text-sm">
                    Kirim Ulasan Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- FOOTER SECTION (Clean Dark Footer) -->
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

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Quick Filter Search helper
        function setFilter(term) {
            const input = document.getElementById('searchInput');
            if (input) {
                input.value = term;
                input.form.submit();
            }
        }

        // Testimonial & Manual Rating System
        const defaultReviews = [
            {
                name: "Aidil Ardiansyah",
                role: "Peternak Lele - Bengkalis",
                rating: 5,
                message: "FishNote sangat membantu saya dalam mengelola budidaya lele. Sekarang semua data tersimpan rapi dan saya bisa promosi langsung ke pembeli!"
            },
            {
                name: "Yuniarti Mulansari",
                role: "Peternak Nila - Bengkalis",
                rating: 5,
                message: "Platform yang sangat intuitif dan bersih! Penjualan ikan nila saya meningkat drastis sejak dipromosikan di FishNote. Sangat direkomendasikan!"
            },
            {
                name: "Izzatul Afidah",
                role: "Pembeli Ikan Segar - Riau",
                rating: 5,
                message: "Sangat mudah menemukan pasokan ikan segar berkualitas langsung dari peternak lokal tanpa biaya perantara. Luar biasa!"
            }
        ];

        function getReviews() {
            const stored = localStorage.getItem('fishnote_user_reviews');
            if (stored) {
                try {
                    return JSON.parse(stored);
                } catch(e) {
                    return defaultReviews;
                }
            }
            return defaultReviews;
        }

        let currentReviewFilter = 'semua';

        function setReviewFilter(filterValue) {
            currentReviewFilter = filterValue;
            
            // Update UI Buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-brand-600', 'text-white');
                btn.classList.add('bg-slate-100', 'text-slate-600');
            });
            
            const activeBtn = document.getElementById('btnFilter-' + filterValue);
            if(activeBtn) {
                activeBtn.classList.remove('bg-slate-100', 'text-slate-600');
                activeBtn.classList.add('bg-brand-600', 'text-white');
            }

            renderTestimonials();
        }

        function renderTestimonials() {
            const container = document.getElementById('testimonialGrid');
            if (!container) return;

            let reviews = getReviews();
            
            // Apply Filters
            if (currentReviewFilter === 'baik') {
                reviews = reviews.filter(r => r.rating >= 4);
            } else if (currentReviewFilter === 'buruk') {
                reviews = reviews.filter(r => r.rating <= 3);
            } else if (typeof currentReviewFilter === 'number') {
                reviews = reviews.filter(r => r.rating === currentReviewFilter);
            }

            if(reviews.length === 0) {
                container.innerHTML = `<div class="col-span-full text-center py-12 text-slate-500 font-medium bg-slate-50 rounded-3xl border border-dashed border-slate-300">Tidak ada ulasan untuk filter ini.</div>`;
                return;
            }

            container.innerHTML = reviews.map(r => {
                const initials = r.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
                const starsHtml = Array.from({length: 5}, (_, i) => 
                    `<i class="fa-solid fa-star ${i < r.rating ? 'text-amber-400' : 'text-slate-200'}"></i>`
                ).join('');

                return `
                    <div class="p-5 rounded-2xl bg-gradient-to-t from-white via-white/80 to-blue-50/20 backdrop-blur-sm ring-1 ring-white/50 shadow-[0_4px_15px_-5px_rgba(59,130,246,0.05)] hover:-translate-y-1 hover:shadow-[0_8px_20px_-5px_rgba(59,130,246,0.1)] transition-all duration-300 flex flex-col justify-between group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <div class="flex items-center space-x-3 mb-3 pb-3 border-b border-brand-100/50">
                                <div class="w-8 h-8 bg-gradient-to-br from-brand-500 to-brand-600 rounded-full flex items-center justify-center text-white font-bold text-[10px] shadow-sm flex-shrink-0 group-hover:scale-105 transition-transform">
                                    ${initials}
                                </div>
                                <div class="flex flex-col">
                                    <h4 class="font-semibold text-slate-800 text-[11px] sm:text-xs">${r.name}</h4>
                                    <div class="flex items-center space-x-0.5 text-[9px] sm:text-[10px] mt-0.5">
                                        ${starsHtml}
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 text-[11px] sm:text-xs leading-relaxed line-clamp-4">
                                ${r.message}
                            </p>
                        </div>
                        <p class="text-[10px] text-brand-600/70 mt-4 font-medium relative z-10">
                            ${r.role}
                        </p>
                    </div>
                `;
            }).join('');
        }

        // Modal Rating Handlers
        let selectedStars = 5;

        function openRatingModal() {
            document.getElementById('ratingModal').classList.remove('hidden');
            setRating(5);
        }

        function closeRatingModal() {
            document.getElementById('ratingModal').classList.add('hidden');
        }

        function highlightStars(count) {
            const stars = document.querySelectorAll('.star-rating i');
            stars.forEach((star, idx) => {
                if (idx < count) {
                    star.classList.add('text-amber-400');
                    star.classList.remove('text-slate-300');
                } else {
                    star.classList.remove('text-amber-400');
                    star.classList.add('text-slate-300');
                }
            });
        }

        function resetStars() {
            highlightStars(selectedStars);
        }

        function setRating(val) {
            selectedStars = val;
            document.getElementById('selectedRating').value = val;
            const labels = ["", "1.0 / 5.0 (Buruk)", "2.0 / 5.0 (Cukup)", "3.0 / 5.0 (Bagus)", "4.0 / 5.0 (Sangat Bagus)", "5.0 / 5.0 (Sangat Memuaskan!)"];
            document.getElementById('ratingText').innerText = labels[val];
            highlightStars(val);
        }

        function submitRating(e) {
            e.preventDefault();
            const name = document.getElementById('reviewerName').value.trim();
            const role = document.getElementById('reviewerRole').value.trim();
            const message = document.getElementById('reviewerMessage').value.trim();
            const rating = parseInt(selectedStars);

            if (!name || !role || !message) return;

            const newReview = { name, role, rating, message };
            const reviews = getReviews();
            reviews.unshift(newReview);

            localStorage.setItem('fishnote_user_reviews', JSON.stringify(reviews));
            renderTestimonials();
            closeRatingModal();
            document.getElementById('ratingForm').reset();
            
            alert('Terima kasih! Ulasan dan rating Anda telah berhasil ditambahkan.');
        }

        // Banner Slider Interactive Logic
        let currentBannerSlide = 0;
        let bannerTimer = null;

        function goToBannerSlide(index) {
            const slides = document.querySelectorAll('.banner-slide');
            const dots = document.querySelectorAll('.banner-dot');
            if (!slides.length || !dots.length) return;

            currentBannerSlide = index % slides.length;

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

            dots.forEach((dot, idx) => {
                if (idx === currentBannerSlide) {
                    dot.className = 'banner-dot w-8 h-2.5 bg-brand-600 rounded-full transition-all duration-300 shadow-sm';
                } else {
                    dot.className = 'banner-dot w-2.5 h-2.5 bg-brand-600/30 hover:bg-brand-600/60 rounded-full transition-all duration-300';
                }
            });

            // Reset timer on manual click
            if (bannerTimer) clearInterval(bannerTimer);
            bannerTimer = setInterval(() => {
                goToBannerSlide(currentBannerSlide + 1);
            }, 4500);
        }

        // Benefit Slider Logic
        let currentBenefitSlide = 0;
        let benefitTimer = null;

        function goToBenefitSlide(index) {
            const slides = document.querySelectorAll('.benefit-slide');
            if (!slides.length) return;

            currentBenefitSlide = index % slides.length;

            slides.forEach((slide, idx) => {
                if (idx === currentBenefitSlide) {
                    slide.classList.remove('hidden', '-translate-x-4');
                    slide.classList.add('translate-x-4');
                    setTimeout(() => {
                        slide.classList.remove('translate-x-4', 'opacity-0');
                        slide.classList.add('translate-x-0', 'opacity-100');
                    }, 50);
                } else {
                    slide.classList.add('-translate-x-4', 'opacity-0');
                    slide.classList.remove('translate-x-0', 'opacity-100', 'translate-x-4');
                    setTimeout(() => { slide.classList.add('hidden'); }, 700);
                }
            });



            if (benefitTimer) clearInterval(benefitTimer);
            benefitTimer = setInterval(() => {
                goToBenefitSlide(currentBenefitSlide + 1);
            }, 4000);
        }

        // Initial render & auto-slider
        document.addEventListener('DOMContentLoaded', () => {
            renderTestimonials();
            
            // Start auto slide timer
            bannerTimer = setInterval(() => {
                goToBannerSlide(currentBannerSlide + 1);
            }, 4500);

            benefitTimer = setInterval(() => {
                goToBenefitSlide(currentBenefitSlide + 1);
            }, 4000);
        });
    </script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.3s ease-out forwards;
        }
        /* Custom scrollbar for chat */
        #ai-chat-body::-webkit-scrollbar { width: 6px; }
        #ai-chat-body::-webkit-scrollbar-track { background: transparent; }
        #ai-chat-body::-webkit-scrollbar-thumb { background-color: rgba(203, 213, 225, 0.5); border-radius: 20px; }
    </style>
    
    <!-- AI Assistant Widget -->
    <div id="ai-widget-container" class="fixed bottom-6 right-6 z-[100] flex flex-col items-end" style="touch-action: none;">
        <!-- Chat Modal -->
        <div id="ai-chat-modal" class="hidden w-80 sm:w-96 bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_10px_40px_rgb(0,0,0,0.15)] border border-white/50 mb-4 overflow-hidden flex flex-col h-[480px] transition-all duration-300 transform scale-95 opacity-0 origin-bottom-right">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600/95 to-cyan-500/95 backdrop-blur-md text-white p-4 flex items-center justify-between cursor-default border-b border-white/20">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full flex items-center justify-center bg-white/20 p-[2px] shadow-inner border border-white/30">
                        <img src="{{ asset('images/fishbot_avatar.png') }}" class="w-full h-full rounded-full object-cover" alt="FishBot">
                    </div>
                    <div>
                        <h3 class="font-bold text-sm">FishBot Assistant</h3>
                        <p class="text-[10px] text-brand-100">Pakar Budidaya Ikan AI</p>
                    </div>
                </div>
                <button id="ai-close-btn" class="text-white/70 hover:text-white transition focus:outline-none">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <!-- Chat Body -->
            <div id="ai-chat-body" class="flex-1 p-4 overflow-y-auto bg-slate-50/40 space-y-4 text-sm scroll-smooth">
                <!-- Initial Message -->
                <div class="flex items-start gap-2 max-w-[85%] animate-fade-in-up">
                    <div class="w-8 h-8 rounded-full flex flex-shrink-0 items-center justify-center p-[2px] shadow-sm border border-brand-200 bg-white">
                        <img src="{{ asset('images/fishbot_avatar.png') }}" class="w-full h-full rounded-full object-cover" alt="FishBot">
                    </div>
                    <div class="bg-white/95 backdrop-blur-sm border border-slate-200/60 p-3 rounded-2xl rounded-tl-sm shadow-sm text-slate-700 leading-relaxed">
                        Halo! Saya FishBot 🐟. Ada yang ingin Anda tanyakan seputar pengalaman budidaya ikan atau masalah kolam?
                    </div>
                </div>
            </div>
            
            <!-- Input Area -->
            <div class="p-3 bg-white/90 backdrop-blur-md border-t border-slate-100/80 flex items-center gap-2">
                <input type="text" id="ai-chat-input" placeholder="Tanya tentang budidaya..." class="flex-1 bg-slate-100/70 border border-slate-200/50 rounded-full px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:bg-white transition shadow-inner" autocomplete="off">
                <button id="ai-send-btn" class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-cyan-500 text-white rounded-full flex items-center justify-center hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/30 transition-all disabled:opacity-50 disabled:hover:scale-100 focus:outline-none">
                    <i class="fa-solid fa-paper-plane text-xs relative -left-[1px]"></i>
                </button>
            </div>
        </div>

        <!-- Floating Button (Draggable) -->
        <div id="ai-fab" class="relative group cursor-grab active:cursor-grabbing">
            <!-- Ping animation -->
            <div class="absolute inset-0 bg-cyan-400 rounded-full animate-ping opacity-75"></div>
            <!-- Main Button -->
            <button class="relative w-[68px] h-[68px] bg-gradient-to-tr from-blue-600 to-cyan-400 rounded-full shadow-[0_8px_25px_rgba(6,182,212,0.5)] flex items-center justify-center hover:scale-110 transition-transform border-[3px] border-white p-[3px] pointer-events-none">
                <img src="{{ asset('images/fishbot_avatar.png') }}" class="w-full h-full rounded-full object-cover shadow-inner" alt="FishBot">
            </button>
            <!-- Tooltip -->
            <div class="absolute right-full mr-4 top-1/2 -translate-y-1/2 bg-slate-800 text-white text-xs px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition pointer-events-none hidden sm:block">
                Tanya Pakar Ikan AI
                <!-- triangle -->
                <div class="absolute top-1/2 left-full -translate-y-1/2 border-4 border-transparent border-l-slate-800"></div>
            </div>
        </div>
    </div>

    <!-- AI Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fab = document.getElementById('ai-fab');
            const widgetContainer = document.getElementById('ai-widget-container');
            const chatModal = document.getElementById('ai-chat-modal');
            const closeBtn = document.getElementById('ai-close-btn');
            const chatBody = document.getElementById('ai-chat-body');
            const chatInput = document.getElementById('ai-chat-input');
            const sendBtn = document.getElementById('ai-send-btn');
            
            let isDragging = false;
            let currentX;
            let currentY;
            let initialX;
            let initialY;
            let xOffset = 0;
            let yOffset = 0;
            let isChatOpen = false;

            // --- DRAG LOGIC ---
            fab.addEventListener("mousedown", dragStart);
            document.addEventListener("mouseup", dragEnd);
            document.addEventListener("mousemove", drag);

            fab.addEventListener("touchstart", dragStart, {passive: false});
            document.addEventListener("touchend", dragEnd);
            document.addEventListener("touchmove", drag, {passive: false});

            function dragStart(e) {
                if (e.type === "touchstart") {
                    initialX = e.touches[0].clientX - xOffset;
                    initialY = e.touches[0].clientY - yOffset;
                } else {
                    initialX = e.clientX - xOffset;
                    initialY = e.clientY - yOffset;
                }

                if (e.target === fab || fab.contains(e.target)) {
                    isDragging = true;
                }
            }

            function dragEnd(e) {
                if(!isDragging) return;
                initialX = currentX;
                initialY = currentY;
                isDragging = false;
                
                // If the drag was very small, treat as a click to open chat
                const dx = currentX !== undefined ? currentX - (xOffset || 0) : 0;
                const dy = currentY !== undefined ? currentY - (yOffset || 0) : 0;
                const dragDistance = Math.abs(dx) + Math.abs(dy);
                
                // If practically no movement, then it's a click
                if (dragDistance < 5) {
                   toggleChat();
                }
            }

            function drag(e) {
                if (isDragging) {
                    e.preventDefault();
                    if (e.type === "touchmove") {
                        currentX = e.touches[0].clientX - initialX;
                        currentY = e.touches[0].clientY - initialY;
                    } else {
                        currentX = e.clientX - initialX;
                        currentY = e.clientY - initialY;
                    }
                    xOffset = currentX;
                    yOffset = currentY;
                    setTranslate(currentX, currentY, widgetContainer);
                }
            }

            function setTranslate(xPos, yPos, el) {
                el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
            }

            // --- CHAT UI LOGIC ---
            function toggleChat() {
                isChatOpen = !isChatOpen;
                if(isChatOpen) {
                    chatModal.classList.remove('hidden');
                    // slight delay for animation
                    setTimeout(() => {
                        chatModal.classList.remove('scale-95', 'opacity-0');
                        chatModal.classList.add('scale-100', 'opacity-100');
                        chatInput.focus();
                    }, 10);
                } else {
                    chatModal.classList.remove('scale-100', 'opacity-100');
                    chatModal.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        chatModal.classList.add('hidden');
                    }, 300);
                }
            }

            closeBtn.addEventListener('click', toggleChat);

            function appendMessage(sender, text) {
                const msgDiv = document.createElement('div');
                msgDiv.className = `flex items-start gap-2 max-w-[85%] ${sender === 'user' ? 'ml-auto flex-row-reverse' : ''}`;
                
                let avatar = sender === 'user' 
                    ? `<div class="w-8 h-8 bg-gradient-to-tr from-slate-200 to-slate-100 rounded-full flex flex-shrink-0 items-center justify-center text-slate-500 shadow-sm"><i class="fa-solid fa-user text-xs"></i></div>`
                    : `<div class="w-8 h-8 rounded-full flex flex-shrink-0 items-center justify-center p-[2px] shadow-sm border border-brand-200 bg-white"><img src="{{ asset('images/fishbot_avatar.png') }}" class="w-full h-full rounded-full object-cover"></div>`;
                
                let bubbleClass = sender === 'user'
                    ? `bg-gradient-to-tr from-blue-600 to-cyan-500 text-white p-3 rounded-2xl rounded-tr-sm shadow-md`
                    : `bg-white/95 backdrop-blur-sm border border-slate-200/60 p-3 rounded-2xl rounded-tl-sm shadow-sm text-slate-700 leading-relaxed`;
                
                // Escape HTML tags to prevent innerHTML from breaking on '<' or '>'
                let escapedText = text.replace(/&/g, '&amp;')
                                      .replace(/</g, '&lt;')
                                      .replace(/>/g, '&gt;');
                
                // Format text (simple markdown bold/newlines)
                let formattedText = escapedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>').replace(/\n/g, '<br>');

                msgDiv.innerHTML = `
                    ${avatar}
                    <div class="${bubbleClass}">
                        ${formattedText}
                    </div>
                `;
                
                chatBody.appendChild(msgDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
            }

            function addTypingIndicator() {
                const typingId = 'typing-' + Date.now();
                const msgDiv = document.createElement('div');
                msgDiv.id = typingId;
                msgDiv.className = `flex items-start gap-2 max-w-[85%] animate-fade-in-up`;
                msgDiv.innerHTML = `
                    <div class="w-8 h-8 rounded-full flex flex-shrink-0 items-center justify-center p-[2px] shadow-sm border border-brand-200 bg-white"><img src="{{ asset('images/fishbot_avatar.png') }}" class="w-full h-full rounded-full object-cover"></div>
                    <div class="bg-white/95 backdrop-blur-sm border border-slate-200/60 p-3 rounded-2xl rounded-tl-sm shadow-sm text-slate-500 flex items-center gap-1.5 h-10">
                        <div class="w-1.5 h-1.5 bg-cyan-500 rounded-full animate-bounce" style="animation-delay: 0ms;"></div>
                        <div class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 150ms;"></div>
                        <div class="w-1.5 h-1.5 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 300ms;"></div>
                    </div>
                `;
                chatBody.appendChild(msgDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
                return typingId;
            }

            function removeTypingIndicator(id) {
                const el = document.getElementById(id);
                if(el) el.remove();
            }

            async function sendMessage() {
                const text = chatInput.value.trim();
                if(!text) return;
                
                appendMessage('user', text);
                chatInput.value = '';
                chatInput.disabled = true;
                sendBtn.disabled = true;
                
                const typingId = addTypingIndicator();
                
                try {
                    const response = await fetch('/api/ai-chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: text })
                    });
                    
                    const data = await response.json();
                    removeTypingIndicator(typingId);
                    
                    if (response.ok) {
                        appendMessage('ai', data.reply);
                    } else {
                        appendMessage('ai', data.error || 'Terjadi kesalahan sistem.');
                    }
                } catch (error) {
                    removeTypingIndicator(typingId);
                    appendMessage('ai', 'Gagal menghubungi server. Periksa koneksi internet Anda.');
                }
                
                chatInput.disabled = false;
                sendBtn.disabled = false;
                chatInput.focus();
            }

            sendBtn.addEventListener('click', sendMessage);
            chatInput.addEventListener('keypress', (e) => {
                if(e.key === 'Enter') sendMessage();
            });
        });
    </script>
</body>
</html>
