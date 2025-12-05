<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FishNote - Platform Budidaya Perikanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi Fade In Up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Animasi Scale Up */
        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Animasi Float */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Animasi Slide In Left */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Animasi Slide In Right */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }

        .animate-scaleUp {
            animation: scaleUp 0.6s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        /* Delay animations */
        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        /* Hover effects */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Gradient animation */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Loading state */
        .opacity-0 {
            opacity: 0;
        }

        .opacity-100 {
            opacity: 1;
        }

        /* ========== HERO SLIDER STYLES ========== */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .hero-slide.active {
            opacity: 1;
        }

        /* Overlay biru transparan untuk setiap slide */
        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.85) 0%, rgba(29, 78, 216, 0.75) 50%, rgba(30, 64, 175, 0.65) 100%);
        }

        /* Background images untuk setiap slide */
        .hero-slide-1 {
            background-image: url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1200');
        }

        .hero-slide-2 {
            background-image: url('https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=1200');
        }

        .hero-slide-3 {
            background-image: url('https://images.unsplash.com/photo-1544943910-4c1dc44aab44?w=1200');
        }

        /* Slider Navigation Dots */
        .slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 20;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .slider-dot:hover {
            background: rgba(255, 255, 255, 0.8);
            transform: scale(1.1);
        }

        .slider-dot.active {
            background: white;
            width: 32px;
            border-radius: 6px;
        }

        /* Responsive untuk mobile */
        @media (max-width: 768px) {
            .hero-slider {
                height: 500px;
            }
        }

        @media (max-width: 640px) {
            .hero-slider {
                height: 450px;
            }

            .slider-dots {
                bottom: 20px;
            }

            .slider-dot {
                width: 10px;
                height: 10px;
            }

            .slider-dot.active {
                width: 24px;
            }
        }


        /* Animasi saat scroll */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0;
        }

        /* Delay untuk setiap elemen */
        .delay-0 {
            animation-delay: 0s;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md sticky top-0 z-50 animate-fadeIn">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo dengan Shadow Hover -->
                <a href="{{ route('landing') }}" class="flex items-center space-x-3 animate-slideInLeft group">
                    <img src="{{ asset('template/img/logofishnote.png') }}" alt="FishNote Logo"
                        class="w-17 h-16 object-contain group-hover:scale-110 group-hover:drop-shadow-lg transition duration-300">
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent group-hover:from-blue-700 group-hover:to-blue-900 transition duration-300">
                        Fishnote
                    </span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8 animate-fadeIn delay-200">
                    <a href="{{ route('landing') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover:scale-110 inline-block">
                        Beranda
                    </a>
                    <a href="/promosi"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover:scale-110 inline-block">
                        Promosi
                    </a>
                    <a href="{{ route('landing') }}#kontak"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover:scale-110 inline-block">
                        Kontak
                    </a>
                    <a href="{{ route('about') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover:scale-110 inline-block">
                        Tentang Kami
                    </a>
                </div>

                <!-- Tombol Login & Register -->
                <div class="hidden md:flex items-center space-x-4 animate-slideInRight">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition duration-300 hover:scale-105">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                        Daftar
                    </a>
                </div>

                <!-- Menu Mobile (Hamburger) -->
                <button class="md:hidden" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-3">
                <a href="#beranda" class="block text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="#promosi" class="block text-gray-700 hover:text-blue-600 font-medium">Promosi</a>
                <a href="#tentang" class="block text-gray-700 hover:text-blue-600 font-medium">Tentang Kami</a>
                <a href="#kontak" class="block text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
                <div class="flex flex-col space-y-2 pt-3 border-t">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-center text-blue-600 font-medium border border-blue-600 rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 text-center bg-blue-600 text-white font-medium rounded-lg">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative overflow-hidden">
        <!-- Hero Slider -->
        <div class="hero-slider">
            <!-- Slide 1 -->
            <div class="hero-slide hero-slide-1 active">
                <div class="max-w-7xl mx-auto px-4 py-20 relative z-10 h-full flex items-center">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-white animate-slideInLeft">
                            Platform Digital untuk Budidaya Perikanan Indonesia
                        </h1>
                        <p class="text-xl mb-8 text-white animate-slideInLeft delay-200">
                            Temukan hasil perikanan berkualitas langsung dari peternak terpercaya. Mudah, cepat, dan
                            terjangkau!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 animate-fadeInUp delay-300">
                            <a href="#promosi"
                                class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg text-center hover:bg-gray-100 transition duration-300 hover:scale-105 shadow-lg">
                                Jelajahi Promosi
                            </a>
                            <a href="{{ route('register') }}"
                                class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg text-center hover:bg-white hover:text-blue-600 transition duration-300 hover:scale-105">
                                Daftar Sebagai Peternak
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide hero-slide-2">
                <div class="max-w-7xl mx-auto px-4 py-20 relative z-10 h-full flex items-center">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-white">
                            Hasil Budidaya Berkualitas Tinggi
                        </h1>
                        <p class="text-xl mb-8 text-white">
                            Dapatkan ikan segar langsung dari kolam peternak lokal dengan harga terbaik!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#promosi"
                                class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg text-center hover:bg-gray-100 transition duration-300 hover:scale-105 shadow-lg">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide hero-slide-3">
                <div class="max-w-7xl mx-auto px-4 py-20 relative z-10 h-full flex items-center">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-white">
                            Bergabung dengan Komunitas Peternak
                        </h1>
                        <p class="text-xl mb-8 text-white">
                            Kembangkan bisnis perikanan Anda bersama ribuan peternak di seluruh Indonesia!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register') }}"
                                class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg text-center hover:bg-gray-100 transition duration-300 hover:scale-105 shadow-lg">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Dots -->
            <div class="slider-dots">
                <div class="slider-dot active" onclick="goToSlide(0)"></div>
                <div class="slider-dot" onclick="goToSlide(1)"></div>
                <div class="slider-dot" onclick="goToSlide(2)"></div>
            </div>
        </div>
    </section>

    <!-- SEARCH BAR - PINDAH KE ATAS -->
    <section class="bg-white py-8 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="animate-scaleUp">
                <form action="{{ route('search') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <svg class="absolute left-3 top-3 text-gray-400 w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" name="q" placeholder="Cari jenis ikan, lokasi, atau peternak..."
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            value="{{ request('q') }}">
                    </div>
                    <button type="submit"
                        class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- SECTION PROMOSI -->
    <section id="promosi" class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">Promosi Terbaru</h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">Dapatkan penawaran terbaik dari peternak
                    ikan lokal</p>
            </div>

            <!-- GRID PROMOSI DARI DATABASE -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse($promotions as $index => $promo)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-fadeInUp opacity-0"
                        style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="relative overflow-hidden group">
                            <!-- Gambar Promosi -->
                            @if ($promo->gambar)
                                <img src="{{ asset('storage/' . $promo->gambar) }}" alt="{{ $promo->jenis_ikan }}"
                                    class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1544943910-4c1dc44aab44?w=400"
                                    alt="Default fish"
                                    class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            @endif

                            <!-- Overlay saat hover -->
                            <div
                                class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-20 transition duration-300">
                            </div>

                            <div
                                class="absolute top-3 right-3 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg transform group-hover:scale-110 transition duration-300">
                                Tersedia
                            </div>
                        </div>
                        <div class="p-5">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition duration-300">
                                {{ $promo->jenis_ikan }}</h3>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($promo->deskripsi, 60) }}</p>

                            <!-- Lokasi -->
                            <div class="flex items-center text-gray-500 text-sm mb-3">
                                <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $promo->lokasi ?? 'Riau' }}</span>
                            </div>

                            <!-- Harga & Stok -->
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-sm text-gray-500">Harga</p>
                                    <p class="text-lg font-bold text-blue-600">Rp
                                        {{ number_format($promo->harga, 0, ',', '.') }}/kg</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Stok</p>
                                    <p class="font-semibold text-gray-900">{{ $promo->stok }} kg</p>
                                </div>
                            </div>

                            <!-- Tombol Detail -->
                            <a href="{{ route('promotions.show', $promo->id) }}"
                                class="block w-full bg-blue-600 text-white py-2 rounded-lg font-medium text-center hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Jika tidak ada promosi -->
                    <div class="col-span-full text-center py-12 animate-fadeIn">
                        <div class="inline-block p-8 bg-white rounded-2xl shadow-lg">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4 animate-float" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Promosi</h3>
                            <p class="text-gray-500 mb-4">Promosi dari peternak akan muncul di sini</p>
                            <a href="{{ route('register') }}"
                                class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                                Jadi Peternak Pertama!
                            </a>
                        </div>
                    </div>
                @endforelse

            </div>

            <!-- Tombol Lihat Semua -->
            @if ($promotions->count() > 0)
                <div class="text-center mt-12 animate-fadeInUp delay-500">
                    <!-- Tombol Lihat Semua -->
                    <a href="{{ route('promotions.index') }}"
                        class="inline-block px-8 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition duration-300 hover:scale-105">
                        Lihat Semua Promosi ({{ $promotions->count() }})
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 animate-gradient">
        <div class="max-w-4xl mx-auto px-4 text-center animate-fadeInUp">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Siap Memulai Bisnis Perikanan Anda?
            </h2>
            <p class="text-xl mb-8 text-blue-100">
                Bergabunglah dengan ribuan peternak yang telah sukses memasarkan produk mereka di FishNote
            </p>
            <a href="{{ route('register') }}"
                class="inline-block px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-gray-100 transition duration-300 shadow-2xl hover:scale-105 text-lg">
                Daftar Sekarang - Gratis!
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="animate-fadeInUp">
                    <div class="flex items-center space-x-3 mb-4">
                        <a href="{{ route('landing') }}"
                            class="flex items-center space-x-3 animate-slideInLeft group">
                            <img src="{{ asset('template/img/logofishnote.png') }}" alt="FishNote Logo"
                                class="w-17 h-16 object-contain group-hover:scale-110 group-hover:drop-shadow-lg transition duration-300">
                            <span
                                class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent group-hover:from-blue-700 group-hover:to-blue-900 transition duration-300">
                                Fishnote
                            </span>
                        </a>
                    </div>
                    <p class="text-gray-400 text-sm">Platform digital untuk budidaya perikanan Indonesia</p>
                </div>
                <div class="animate-fadeInUp delay-100">
                    <h3 class="font-bold mb-4">Menu</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#beranda" class="hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#promosi" class="hover:text-white transition duration-300">Promosi</a></li>
                        <li><a href="#tentang" class="hover:text-white transition duration-300">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="animate-fadeInUp delay-200">
                    <h3 class="font-bold mb-4">Bantuan</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition duration-300">Cara Berjualan</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Cara Membeli</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">FAQ</a></li>
                    </ul>
                </div>
                <div class="animate-fadeInUp delay-300">
                    <h3 class="font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>Email: info@fishnote.com</li>
                        <li>Telp: +62 812-3456-7890</li>
                        <li>Alamat: Pekanbaru, Riau</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 FishNote. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Smooth scroll untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[index].classList.add('active');
            dots[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        function goToSlide(index) {
            currentSlide = index;
            showSlide(currentSlide);
        }

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

</body>

</html>
