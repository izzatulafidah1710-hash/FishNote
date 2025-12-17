<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $promosi->judul_promosi }} - FishNote</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- NAVBAR - SAMA SEPERTI LANDING PAGE -->
    <nav class="bg-white bg-opacity-70 backdrop-blur-lg shadow-sm fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo"
                        class="w-20 h-20 object-contain group-hover:scale-110 transition duration-300">
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                        Fishnote
                    </span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-12">
                    <a href="{{ route('landing') }}"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Beranda</span>
                    </a>
                    <a href="{{ route('promosi') }}"
                        class="flex items-center space-x-2 text-blue-700 font-semibold transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        <span>Promosi</span>
                    </a>
                    <a href="{{ route('about') }}"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Tentang Kami</span>
                    </a>
                    <a href="{{ route('landing') }}#kontak"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Kontak</span>
                    </a>
                </div>

                <!-- Tombol Login & Register -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="px-6 py-2.5 text-blue-600 font-semibold hover:bg-blue-50 rounded-xl transition-all duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Menu Mobile (Hamburger) -->
                <button class="md:hidden ml-auto text-gray-700" onclick="toggleMobileMenu()">
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
                <a href="{{ route('landing') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="{{ route('promosi') }}" class="block text-blue-600 font-semibold">Promosi</a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Tentang Kami</a>
                <a href="{{ route('landing') }}#kontak" class="block text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
                <div class="flex flex-col space-y-2 pt-3 border-t">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-center text-blue-600 font-medium border border-blue-600 rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-center bg-blue-600 text-white font-medium rounded-lg">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- BREADCRUMB -->
    <div class="bg-gray-100 py-4 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- LEFT - Image & Info (2/3) -->
            <div class="lg:col-span-2">
                <!-- Image -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                    @if($promosi->foto)
                        <img src="{{ asset('storage/' . $promosi->foto) }}" 
                             alt="{{ $promosi->jenis_ikan }}"
                             class="w-full h-96 object-cover cursor-pointer"
                             onclick="openModal(this.src)">
                        <div class="p-3 bg-gray-50 text-center text-sm text-gray-600">
                            💡 Klik untuk memperbesar
                        </div>
                    @else
                        <div class="w-full h-96 bg-blue-100 flex items-center justify-center">
                            <div class="text-center text-gray-400">
                                <svg class="w-20 h-20 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p>Tidak ada foto</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $promosi->judul_promosi }}</h1>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-3">Deskripsi</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $promosi->deskripsi }}</p>
                </div>

                <!-- Detail Info -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Detail Informasi</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Jenis Ikan</span>
                            <span class="font-semibold text-gray-900">{{ $promosi->jenis_ikan }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Lokasi</span>
                            <span class="font-semibold text-gray-900">{{ $promosi->lokasi }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Satuan</span>
                            <span class="font-semibold text-gray-900">{{ $promosi->satuan }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Dilihat</span>
                            <span class="font-semibold text-gray-900">{{ number_format($promosi->views) }} kali</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Periode</span>
                            <span class="font-semibold text-gray-900">{{ $promosi->tanggal_mulai->format('d M Y') }} - {{ $promosi->tanggal_berakhir->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Sisa Waktu</span>
                            @if($promosi->sisa_hari > 0)
                                <span class="font-semibold text-blue-600">{{ $promosi->sisa_hari }} Hari</span>
                            @else
                                <span class="font-semibold text-red-600">Berakhir</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT - Price & Contact (1/3) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-24">
                    <!-- Status -->
                    <div class="flex items-center justify-center mb-4">
                        <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            {{ $promosi->status }}
                        </span>
                    </div>

                    <!-- Price -->
                    <div class="text-center mb-6 pb-6 border-b">
                        <p class="text-sm text-gray-500 mb-1">Harga</p>
                        <div class="text-3xl font-bold text-blue-600">
                            Rp {{ number_format($promosi->harga, 0, ',', '.') }}
                        </div>
                        <p class="text-gray-600 text-sm">per {{ $promosi->satuan }}</p>
                    </div>

                    <!-- Stock -->
                    <div class="mb-6 pb-6 border-b">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Stok Tersedia</span>
                            <span class="text-xl font-bold text-gray-900">{{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}</span>
                        </div>
                        @if($promosi->stok_tersedia <= 10)
                            <div class="bg-yellow-100 text-yellow-800 px-3 py-2 rounded text-sm font-semibold text-center mt-2">
                                ⚠️ Stok Terbatas!
                            </div>
                        @endif
                    </div>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan {{ urlencode($promosi->judul_promosi) }}" 
                       target="_blank"
                       class="block w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-bold text-center mb-4 transition">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Hubungi Penjual
                        </span>
                    </a>

                    <!-- Contact -->
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-sm text-gray-500 mb-1">Nomor Kontak</p>
                        <p class="font-bold text-gray-900">{{ $promosi->kontak }}</p>
                    </div>

                    <!-- Share -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Bagikan:</p>
                        <div class="flex gap-2">
                            <button onclick="shareWA()" class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2 rounded text-sm font-semibold">
                                WhatsApp
                            </button>
                            <button onclick="shareFB()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded text-sm font-semibold">
                                Facebook
                            </button>
                            <button onclick="copyURL()" class="flex-1 bg-gray-700 hover:bg-gray-800 text-white py-2 rounded text-sm font-semibold">
                                Salin
                            </button>
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="bg-yellow-50 rounded p-3">
                        <p class="font-semibold text-gray-900 mb-2 text-sm">💡 Tips Aman</p>
                        <ul class="text-xs text-gray-700 space-y-1">
                            <li>• Hubungi penjual terlebih dahulu</li>
                            <li>• Cek kondisi barang sebelum beli</li>
                            <li>• Transaksi di tempat aman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('promosi') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-50 shadow">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Promosi
            </a>
        </div>
    </div>

    <!-- FOOTER - FULL WIDTH SEPERTI LANDING PAGE -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-12">
                <!-- Kolom 1 - Logo & Deskripsi -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo"
                            class="w-16 h-16 object-contain">
                        <span class="text-3xl font-bold text-white">
                            Fishnote
                        </span>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed mb-6">
                        Platform digital untuk budidaya perikanan Indonesia yang modern dan terpercaya
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
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
                <div>
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

    <!-- Modal -->
    <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4" onclick="closeModal()">
        <button onclick="closeModal()" class="absolute top-4 right-4 bg-white rounded-full p-2 hover:bg-gray-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImg" src="" class="max-w-full max-h-full rounded-lg">
    </div>

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
            navigator.clipboard.writeText(window.location.href).then(() => alert('Link berhasil disalin!'));
        }
    </script>
</body>

</html>