<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - FishNote</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi yang sama seperti landing page */
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

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

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
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

    <!-- NAVBAR (tentang kami) -->
    <nav class="bg-white bg-opacity-70 backdrop-blur-lg shadow-sm sticky top-0 z-50 animate-fadeIn">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Logo dengan Shadow Hover -->
                <a href="{{ route('about') }}" class="flex items-center space-x-3 animate-slideInLeft group">
                    <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo"
                        class="w-20 h-20 object-contain group-hover:scale-110 group-hover:drop-shadow-lg transition duration-300">
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent group-hover:from-blue-700 group-hover:to-blue-900 transition duration-300">
                        Fishnote
                    </span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-12 animate-fadeIn delay-200">
                    <a href="{{ route('landing') }}"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300 hover:scale-105 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Beranda</span>
                    </a>
                    <a href="{{ route('promosi') }}"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300 hover:scale-105 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        <span>Promosi</span>
                    </a>
                    <a href="{{ route('about') }}"
                        class="flex items-center space-x-2 text-blue-700 font-semibold transition duration-300 hover:scale-105 hover:text-blue-900 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Tentang Kami</span>
                    </a>
                    <a href="{{ route('about') }}#kontak"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300 hover:scale-105 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Kontak</span>
                    </a>
                </div>

                <!-- Tombol Login & Register - STYLE BARU KEREN -->
                <div class="hidden md:flex items-center space-x-3 animate-slideInRight">
                    <a href="{{ route('login') }}"
                        class="px-6 py-2.5 text-blue-600 font-semibold hover:bg-blue-50 rounded-xl transition-all duration-300 hover:scale-105 border-2 border-transparent hover:border-blue-200">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
                <a href="{{ route('promosi') }}#promosi"
                    class="block text-gray-700 hover:text-blue-600 font-medium">Promosi</a>
                <a href="{{ route('about') }}" class="block text-blue-600 font-medium">Tentang Kami</a>
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

    <!-- HEADER SECTION dengan Background Image + Fallback -->
    <section class="relative text-white overflow-hidden"
        style="margin-top: -80px; padding-top: 120px; min-height: 430px;">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('template/img/bg3.jpg') }}');">
            <!-- Overlay Biru Transparan -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/90 via-blue-700/85 to-indigo-900/80"></div>
        </div>

        <!-- Decorative Circles -->
        <div class="absolute top-10 left-10 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center py-12">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fadeInUp">
                Tentang FishNote
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fadeInUp delay-100 leading-relaxed">
                Platform digital terdepan untuk menghubungkan peternak ikan dengan pembeli di seluruh Indonesia
            </p>
        </div>
    </section>

    <!-- TENTANG project -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-slideInLeft">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600" alt="About FishNote"
                        class="rounded-xl shadow-2xl">
                </div>
                <div class="animate-slideInRight">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Tentang FishNote
                    </h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        FishNote adalah platform digital yang menghubungkan peternak ikan dengan pembeli secara
                        langsung.
                        Kami membantu peternak untuk memasarkan hasil budidaya mereka dan memudahkan pembeli menemukan
                        produk perikanan berkualitas dengan harga terbaik.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Dengan sistem pencatatan yang terintegrasi, peternak dapat mengelola usaha mereka lebih efisien
                        sambil mempromosikan produk kepada ribuan calon pembeli di seluruh Indonesia.
                    </p>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-3xl font-bold text-blue-600 mb-2">50+</div>
                            <div class="text-sm text-gray-600">Promosi Aktif</div>
                        </div>
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-3xl font-bold text-blue-600 mb-2">500+</div>
                            <div class="text-sm text-gray-600">Peternak</div>
                        </div>
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-3xl font-bold text-blue-600 mb-2">10K+</div>
                            <div class="text-sm text-gray-600">Transaksi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg card-hover animate-fadeInUp">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform digital terdepan yang menghubungkan ekosistem perikanan Indonesia,
                        meningkatkan kesejahteraan peternak, dan menyediakan akses mudah ke produk perikanan
                        berkualitas bagi seluruh masyarakat.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg card-hover animate-fadeInUp delay-200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">•</span>
                            Memberdayakan peternak ikan lokal dengan teknologi digital
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">•</span>
                            Menyediakan platform jual-beli yang transparan dan efisien
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">•</span>
                            Meningkatkan kualitas dan distribusi produk perikanan nasional
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- TIM KAMI -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">Tim Kami</h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">Orang-orang hebat di balik FishNote</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Tim Member 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-fadeInUp">
                    <div class="relative overflow-hidden group">
                        <img src="{{ asset('images/foto tim, aidil.png') }}" alt="Aidil Ardiansyah"
                            class="w-44 h-56 object-cover rounded-lg mx-auto">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Aidil Ardiansyah</h3>
                        <p class="text-blue-600 font-medium mb-3">Back-End Developer </p>
                        <p class="text-gray-600 text-sm mb-4">
                            Memimpin visi dan strategi project untuk mengembangkan pencatatan hasil budidaya perikanan
                            digital
                            Indonesia
                        </p>
                        <div class="flex justify-center space-x-3">
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tim Member 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-fadeInUp delay-100">
                    <div class="relative overflow-hidden group">
                        <img src="{{ asset('images/foto tim, mulan.jpg') }}" alt="Aidil Ardiansyah"
                            class="w-44 h-56 object-cover rounded-lg mx-auto">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Yuniarti Mulansari</h3>
                        <p class="text-blue-600 font-medium mb-3">UI/UX Designer</p>
                        <p class="text-gray-600 text-sm mb-4">
                            Bertanggung jawab atas pengembangan teknologi dan infrastruktur platform FishNote
                        </p>
                        <div class="flex justify-center space-x-3">
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tim Member 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-fadeInUp delay-200">
                    <div class="relative overflow-hidden group">
                        <img src="{{ asset('images/foto tim, izza.jpg') }}" alt="Aidil Ardiansyah"
                            class="w-44 h-56 object-cover rounded-lg mx-auto">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Izzatul Afidah</h3>
                        <p class="text-blue-600 font-medium mb-3">Front-End Developer</p>
                        <p class="text-gray-600 text-sm mb-4">
                            Mengelola strategi promosi dan membangun hubungan dengan peternak serta pembeli/pengunjung
                        </p>
                        <div class="flex justify-center space-x-3">
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
    <footer id="kontak" class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-12">
                <!-- Kolom 1 - Logo & Deskripsi -->
                <div class="animate-fadeInUp">
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('template/img/logo1.png') }}" alt="FishNote Logo"
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
