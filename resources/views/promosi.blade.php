<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Promosi - FishNote</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('template/img/logofishnote.png') }}" alt="FishNote Logo"
                        class="w-17 h-16 object-contain group-hover:scale-110 transition duration-300">
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                        Fishnote
                    </span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300">Beranda</a>
                    <a href="{{ route('promosi') }}" class="text-blue-600 font-medium"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300">Promosi</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('promosi') }}#kontak"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover:scale-110 inline-block">
                        Kontak
                    </a>
                </div>

                <!-- Tombol Login & Register -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                        Daftar
                    </a>
                </div>

                <!-- Menu Mobile (Hamburger) -->
                <button class="md:hidden" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-3">
                <a href="{{ route('landing') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="{{ route('promosi') }}" class="block text-blue-600 font-medium">Promosi</a>
                <a href="{{ route('promosi') }}#kontak" class="block text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Tentang Kami</a>
                <div class="flex flex-col space-y-2 pt-3 border-t">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-center text-blue-600 font-medium border border-blue-600 rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-center bg-blue-600 text-white font-medium rounded-lg">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInUp">
                Semua Promosi Perikanan
            </h1>
            <p class="text-xl text-blue-100 mb-8 animate-fadeInUp">
                Temukan berbagai penawaran terbaik dari peternak ikan di seluruh Indonesia
            </p>
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto animate-fadeInUp">
                <form action="{{ route('promosi') }}" method="GET" class="flex gap-3">
                    <div class="flex-1 relative">
                        <svg class="absolute left-4 top-4 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" name="q" placeholder="Cari jenis ikan, lokasi, atau peternak..." 
                            class="w-full pl-12 pr-4 py-3 rounded-xl text-gray-900 focus:ring-2 focus:ring-white" 
                            value="{{ request('q') }}">
                    </div>
                    <button type="submit" class="px-8 py-3 bg-white text-blue-600 font-bold rounded-xl hover:bg-gray-100 transition duration-300">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FILTER SECTION -->
    <section class="bg-white border-b py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                
                <!-- Filter Kategori -->
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium">
                        Semua
                    </button>
                
                <!-- Sort -->
                <div class="flex items-center gap-2">
                    <span class="text-gray-600 text-sm font-medium">Urutkan:</span>
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option>Terbaru</option>
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                        <option>Stok Terbanyak</option>
                    </select>
                </div>
            </div>
            
            <!-- Result Count -->
            <div class="mt-4">
                <p class="text-gray-600">
                    Menampilkan <span class="font-bold text-gray-900">{{ $promotions->count() }}</span> promosi
                    @if(request('q'))
                        untuk "<span class="font-bold text-blue-600">{{ request('q') }}</span>"
                    @endif
                </p>
            </div>
        </div>
    </section>

    <!-- GRID PROMOSI -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($promotions as $index => $promo)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-fadeInUp opacity-0"
                        style="animation-delay: {{ ($index % 12) * 0.05 }}s; animation-fill-mode: forwards;">
                        <div class="relative overflow-hidden group">
                            @if ($promo->gambar)
                                <img src="{{ asset('storage/' . $promo->gambar) }}" alt="{{ $promo->jenis_ikan }}"
                                    class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            @else
                                <img src=""
                                    alt="Default fish"
                                    class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            @endif
                            
                            <div class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-20 transition duration-300"></div>
                            
                            <div class="absolute top-3 right-3 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                Tersedia
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-blue-600 transition duration-300">
                                {{ $promo->jenis_ikan }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($promo->deskripsi, 50) }}</p>
                            
                            <!-- Lokasi -->
                            <div class="flex items-center text-gray-500 text-sm mb-3">
                                <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $promo->lokasi ?? 'Riau' }}</span>
                            </div>
                            
                            <!-- Harga & Stok -->
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs text-gray-500">Harga</p>
                                    <p class="text-lg font-bold text-blue-600">Rp {{ number_format($promo->harga, 0, ',', '.') }}/kg</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Stok</p>
                                    <p class="font-bold text-gray-900">{{ $promo->stok }} kg</p>
                                </div>
                            </div>
                            
                            <!-- Tombol -->
                            <button class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @empty
                    <!-- Tidak Ada Promosi -->
                    <div class="col-span-full text-center py-16">
                        <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Promosi Tidak Ditemukan</h3>
                        <p class="text-gray-500 mb-6">Coba kata kunci lain atau lihat semua promosi</p>
                        <a href="{{ route('promosi') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Lihat Semua Promosi
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($promotions->count() > 0)
            <div class="mt-12">
                {{ $promotions->links() }}
            </div>
            @endif
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="kontak" class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-12">
                <!-- Kolom 1 - Logo & Deskripsi -->
                <div class="animate-fadeInUp">
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('template/img/logofishnote.png') }}" alt="FishNote Logo"
                            class="w-16 h-16 object-contain">
                        <span class="text-3xl font-bold text-white">
                            Fishnote
                        </span>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed">
                        Platform digital untuk budidaya perikanan Indonesia yang modern dan terpercaya
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4 mt-6">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z" />
                                <path
                                    d="M12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2 - Menu -->
                <div class="animate-fadeInUp delay-100">
                    <h3 class="text-xl font-bold mb-6 text-white">Menu</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('landing') }}"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('promosi') }}"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                Promosi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3 - Bantuan -->
                <div class="animate-fadeInUp delay-200">
                    <h3 class="text-xl font-bold mb-6 text-white">Bantuan</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                Cara Berjualan
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                Cara Membeli
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-white transition duration-300 text-base flex items-center group">
                                <span class="mr-2 group-hover:mr-3 transition-all"></span>
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 4 - Kontak -->
                <div class="animate-fadeInUp delay-300">
                    <h3 class="text-xl font-bold mb-6 text-white">Kontak</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400 text-base">admin@fishnote.com</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400 text-base">+62 831-6759-1147</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400 text-base">Bengkalis, Riau<br>Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-base mb-4 md:mb-0">
                        &copy; 2025 FishNote. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#"
                            class="text-gray-400 hover:text-white transition duration-300 text-base">Privacy Policy</a>
                        <a href="#"
                            class="text-gray-400 hover:text-white transition duration-300 text-base">Terms of
                            Service</a>
                        <a href="#"
                            class="text-gray-400 hover:text-white transition duration-300 text-base">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>