@extends('layouts.app')

@section('page')

<!-- HERO SECTION -->
<section class="bg-blue-600 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fadeInUp">
            Promosi Terbaru
        </h1>
        <p class="text-blue-100 text-lg md:text-xl animate-fadeInUp delay-100">
            Temukan berbagai penawaran ikan segar langsung dari peternak lokal
        </p>
    </div>
</section>

<!-- CONTENT SECTION -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">

        <!-- JUDUL KONTEN -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3 animate-fadeInUp">
                Daftar Promosi
            </h2>
            <p class="text-gray-600 animate-fadeInUp delay-100">
                Semua promosi terbaru untuk kamu yang mencari harga terbaik
            </p>
        </div>

        <!-- GRID PROMOSI -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($promotions as $index => $promo)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden animate-fadeInUp opacity-0"
                    style="animation-delay: {{ $index * 0.1 }}s; animation-fill-mode: forwards;">

                    <!-- GAMBAR -->
                    <div class="relative">
                        @if ($promo->gambar)
                            <img src="{{ asset('storage/' . $promo->gambar) }}"
                                class="w-full h-52 object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1544943910-4c1dc44aab44?w=800"
                                class="w-full h-52 object-cover">
                        @endif

                        <span class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 text-xs rounded-full shadow">
                            Tersedia
                        </span>
                    </div>

                    <!-- ISI CARD -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {{ $promo->jenis_ikan }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($promo->deskripsi, 80) }}
                        </p>

                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $promo->lokasi ?? 'Riau' }}
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <p class="text-gray-500 text-sm">Harga</p>
                                <p class="text-lg font-bold text-blue-600">
                                    Rp {{ number_format($promo->harga, 0, ',', '.') }}/kg
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="text-gray-500 text-sm">Stok</p>
                                <p class="font-semibold text-gray-900">{{ $promo->stok }} kg</p>
                            </div>
                        </div>

                        <a href="{{ route('promosi.page') }}">Promosi</a>
                            class="block w-full bg-blue-600 text-center text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>

            @empty
                <!-- JIKA TIDAK ADA PROMOSI -->
                <div class="col-span-full text-center py-12">
                    <div class="bg-white p-10 rounded-xl shadow-md inline-block">
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Promosi</h3>
                        <p class="text-gray-500 mb-4">Promosi terbaru akan tampil di sini</p>
                        <a href="{{ route('register') }}"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Jadi Peternak Pertama!
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
