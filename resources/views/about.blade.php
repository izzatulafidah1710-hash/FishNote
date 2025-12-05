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

    <!-- NAVBAR (sama seperti landing page) -->
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
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300">Beranda</a>
                    <a href="{{ route('landing') }}#promosi"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300">Promosi</a>
                    <a href="#kontak"
                        class="text-gray-700 hover:text-blue-600 font-medium transition duration-300">Kontak</a>
                    <a href="{{ route('about') }}" class="text-blue-600 font-medium">Tentang Kami</a>
                </div>

                <!-- Tombol Login & Register -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
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
                <a href="{{ route('landing') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="{{ route('landing') }}#promosi"
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

    <!-- HERO ABOUT -->
    <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInUp">Tentang FishNote</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fadeInUp delay-100">
                Platform digital terdepan untuk menghubungkan peternak ikan dengan pembeli di seluruh Indonesia
            </p>
        </div>
    </section>

    <!-- TENTANG PERUSAHAAN -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-slideInLeft">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600" 
                        alt="About FishNote"
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
                       <img src="{{ asset('images/foto tim, aidil.jpg') }}"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Aidil Ardiansyah</h3>
                        <p class="text-blue-600 font-medium mb-3">Back-End Developer </p>
                        <p class="text-gray-600 text-sm mb-4">
                            Memimpin visi dan strategi perusahaan untuk mengembangkan ekosistem perikanan digital
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
                        <img src="{{ asset('images/foto tim, mulan.jpg') }}"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
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
                       <img src="{{ asset('images/foto tim, izza.jpg') }}"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Izzatul Afidah</h3>
                        <p class="text-blue-600 font-medium mb-3">Front-End Developer</p>
                        <p class="text-gray-600 text-sm mb-4">
                            Mengelola strategi pemasaran dan membangun hubungan dengan peternak serta pembeli
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
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center animate-fadeInUp">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Siap Bergabung dengan FishNote?
            </h2>
            <p class="text-xl mb-8 text-blue-100">
                Mari bersama-sama memajukan industri perikanan Indonesia
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
                <div>
                    <a href="{{ route('landing') }}" class="flex items-center space-x-3 animate-slideInLeft group">
                        <img src="{{ asset('template/img/logofishnote.png') }}" alt="FishNote Logo"
                            class="w-17 h-16 object-contain group-hover:scale-110 group-hover:drop-shadow-lg transition duration-300">
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent group-hover:from-blue-700 group-hover:to-blue-900 transition duration-300">
                            Fishnote
                        </span>
                    </a>
                    <p class="text-gray-400 text-sm">Platform digital untuk budidaya perikanan Indonesia</p>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Menu</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="{{ route('landing') }}"
                                class="hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="{{ route('landing') }}#promosi"
                                class ="hover:text-white transition duration-300">Promosi</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition duration-300">Tentang
                                Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Bantuan</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition duration-300">Cara Berjualan</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Cara Membeli</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>Email: info@fishnote.com</li>
                        <li>Telp: +62 812-3456-7890</li>
                        <li>Alamat: Pekanbaru, Riau</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>© 2025 FishNote. All rights reserved.</p>
            </div>
        </div>
    </footer>
