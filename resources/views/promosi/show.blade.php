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

        .image-zoom {
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }

        .image-zoom:hover {
            transform: scale(1.02);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- NAVBAR -->
    <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo"
                        class="w-16 h-16 object-contain">
                    <span class="text-2xl font-bold text-blue-600">Fishnote</span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                    <a href="{{ route('promosi') }}" class="text-blue-600 font-semibold">Promosi</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 font-medium">Tentang Kami</a>
                </div>

                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-blue-600 font-semibold hover:bg-blue-50 rounded-xl">Masuk</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- BREADCRUMB -->
    <div class="bg-blue-600 text-white py-6 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm mb-2">
                <a href="{{ route('landing') }}" class="hover:underline">Beranda</a>
                <span>/</span>
                <a href="{{ route('promosi') }}" class="hover:underline">Promosi</a>
                <span>/</span>
                <span>{{ $promosi->jenis_ikan }}</span>
            </div>
            <h1 class="text-3xl font-bold">{{ $promosi->judul_promosi }}</h1>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-6">
                <!-- LEFT - Image & Description (2/3) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Image -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        @if($promosi->foto)
                            <img src="{{ asset('storage/' . $promosi->foto) }}" 
                                 alt="{{ $promosi->jenis_ikan }}"
                                 class="w-full h-96 object-cover image-zoom"
                                 onclick="openImageModal(this.src)">
                        @else
                            <div class="w-full h-96 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                        @if($promosi->foto)
                        <div class="p-4 bg-gray-50 text-center">
                            <p class="text-sm text-gray-600">💡 Klik gambar untuk memperbesar</p>
                        </div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Deskripsi Produk
                        </h2>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $promosi->deskripsi }}</p>
                    </div>

                    <!-- Detail Information -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Detail Informasi
                        </h2>

                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- Jenis Ikan -->
                            <div class="flex items-center space-x-3 p-4 bg-blue-50 rounded-lg">
                                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Ikan</p>
                                    <p class="font-bold text-gray-900">{{ $promosi->jenis_ikan }}</p>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="flex items-center space-x-3 p-4 bg-green-50 rounded-lg">
                                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Lokasi</p>
                                    <p class="font-bold text-gray-900">{{ $promosi->lokasi }}</p>
                                </div>
                            </div>

                            <!-- Satuan -->
                            <div class="flex items-center space-x-3 p-4 bg-yellow-50 rounded-lg">
                                <div class="w-10 h-10 bg-yellow-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Satuan</p>
                                    <p class="font-bold text-gray-900">{{ $promosi->satuan }}</p>
                                </div>
                            </div>

                            <!-- Views -->
                            <div class="flex items-center space-x-3 p-4 bg-purple-50 rounded-lg">
                                <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Dilihat</p>
                                    <p class="font-bold text-gray-900">{{ number_format($promosi->views) }} kali</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Periode Promosi -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Periode Promosi
                        </h2>

                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-3xl mb-2">📅</div>
                                <p class="text-sm text-gray-500 mb-1">Tanggal Mulai</p>
                                <p class="font-bold text-gray-900">{{ $promosi->tanggal_mulai->format('d M Y') }}</p>
                            </div>

                            <div class="text-center p-4 bg-red-50 rounded-lg">
                                <div class="text-3xl mb-2">⏰</div>
                                <p class="text-sm text-gray-500 mb-1">Tanggal Berakhir</p>
                                <p class="font-bold text-gray-900">{{ $promosi->tanggal_berakhir->format('d M Y') }}</p>
                            </div>

                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-3xl mb-2">⏳</div>
                                <p class="text-sm text-gray-500 mb-1">Sisa Waktu</p>
                                @if($promosi->sisa_hari > 0)
                                    <p class="font-bold text-blue-600">{{ $promosi->sisa_hari }} Hari</p>
                                @else
                                    <p class="font-bold text-red-600">Berakhir</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT - Sidebar (1/3) -->
                <div class="lg:col-span-1">
                    <!-- Price & Stock Card - Sticky -->
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                        <!-- Status Badge -->
                        <div class="mb-4">
                            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                {{ $promosi->status }}
                            </span>
                        </div>

                        <!-- Price -->
                        <div class="text-center mb-6 pb-6 border-b">
                            <p class="text-sm text-gray-500 mb-2">Harga</p>
                            <div class="text-4xl font-bold text-blue-600 mb-1">
                                Rp {{ number_format($promosi->harga, 0, ',', '.') }}
                            </div>
                            <p class="text-gray-600">per {{ $promosi->satuan }}</p>
                        </div>

                        <!-- Stock -->
                        <div class="mb-6 pb-6 border-b">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Stok Tersedia</span>
                                <span class="text-2xl font-bold text-gray-900">{{ number_format($promosi->stok_tersedia) }} {{ $promosi->satuan }}</span>
                            </div>
                            @if($promosi->stok_tersedia <= 10)
                                <div class="bg-yellow-100 text-yellow-800 px-3 py-2 rounded-lg text-sm font-semibold text-center mt-3">
                                    ⚠️ Stok Terbatas!
                                </div>
                            @endif
                        </div>

                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/62{{ ltrim($promosi->kontak, '0') }}?text=Halo, saya tertarik dengan {{ urlencode($promosi->judul_promosi) }}" 
                           target="_blank"
                           class="block w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-xl font-bold text-center mb-4">
                            <span class="flex items-center justify-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Hubungi Penjual
                            </span>
                        </a>

                        <!-- Contact Info -->
                        <div class="mb-6">
                            <p class="text-sm text-gray-500 mb-1">Nomor Kontak</p>
                            <p class="text-lg font-bold text-gray-900">{{ $promosi->kontak }}</p>
                        </div>

                        <!-- Info -->
                        <div class="bg-blue-50 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-blue-800">Klik tombol di atas untuk chat langsung via WhatsApp</p>
                            </div>
                        </div>

                        <!-- Share -->
                        <div class="mt-6 pt-6 border-t">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Bagikan:</p>
                            <div class="flex gap-2">
                                <button onclick="shareWhatsApp()" class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-semibold">
                                    WhatsApp
                                </button>
                                <button onclick="shareFacebook()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-sm font-semibold">
                                    Facebook
                                </button>
                                <button onclick="copyLink()" class="flex-1 bg-gray-700 hover:bg-gray-800 text-white py-2 rounded-lg text-sm font-semibold">
                                    Salin
                                </button>
                            </div>
                        </div>

                        <!-- Safety Tips -->
                        <div class="mt-6 bg-yellow-50 rounded-lg p-4">
                            <p class="font-semibold text-gray-900 mb-2 text-sm">💡 Tips Aman</p>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Hubungi penjual terlebih dahulu</li>
                                <li>• Cek kondisi barang sebelum membeli</li>
                                <li>• Lakukan transaksi di tempat aman</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('promosi') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-xl hover:bg-gray-50 shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Promosi
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo" class="w-12 h-12">
                        <span class="text-2xl font-bold">Fishnote</span>
                    </div>
                    <p class="text-gray-400">Platform digital untuk budidaya perikanan Indonesia</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing') }}" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('promosi') }}" class="text-gray-400 hover:text-white">Promosi</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Bantuan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Cara Berjualan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Cara Membeli</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>admin@fishnote.com</li>
                        <li>+62 831-6759-1147</li>
                        <li>Bengkalis, Riau</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 FishNote. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4" onclick="closeImageModal()">
        <div class="relative max-w-6xl w-full">
            <button onclick="closeImageModal()" class="absolute top-4 right-4 bg-white rounded-full p-2 hover:bg-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <img id="modalImage" src="" alt="Zoomed" class="w-full h-auto rounded-lg">
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function shareWhatsApp() {
            const text = encodeURIComponent('Lihat promosi {{ $promosi->jenis_ikan }} di FishNote: ' + window.location.href);
            window.open('https://wa.me/?text=' + text, '_blank');
        }

        function shareFacebook() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link berhasil disalin!');
            });
        }

        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</body>

</html>