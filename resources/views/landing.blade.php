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
            height: 700px;
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

        /* Background images dari local storage */
        .hero-slide-1 {
            background-image: url('{{ asset('template/img/bg1.jpg') }}');
        }

        .hero-slide-2 {
            background-image: url('{{ asset('template/img/bg2.jpg') }}');
        }

        .hero-slide-3 {
            background-image: url('{{ asset('template/img/bg3.jpg') }}');
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
                height: 550px;
            }
        }

        @media (max-width: 640px) {
            .hero-slider {
                height: 500px;
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

        /* Animasi untuk fitur cards */
        .feature-card {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .feature-card.animate-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card:nth-child(1) {
            transition-delay: 0.2s;
        }

        .feature-card:nth-child(2) {
            transition-delay: 0.4s;
        }

        .feature-card:nth-child(3) {
            transition-delay: 0.6s;
        }

        .feature-card:nth-child(4) {
            transition-delay: 0.8s;
        }

        /* Animasi untuk step cards */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(60px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .step-card {
            opacity: 0;
            transform: translateY(60px) scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .step-card.animate-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .step-card:nth-child(1) {
            transition-delay: 0.1s;
        }

        .step-card:nth-child(2) {
            transition-delay: 0.3s;
        }

        .step-card:nth-child(3) {
            transition-delay: 0.5s;
        }

        /* Animasi untuk badge number */
        .step-badge {
            transition: transform 0.3s ease;
        }

        .step-card:hover .step-badge {
            transform: scale(1.1) rotate(5deg);
        }

        /* Animasi untuk icon */
        .step-icon-wrapper {
            transition: transform 0.3s ease;
        }

        .step-card:hover .step-icon-wrapper {
            transform: scale(1.1);
        }

        /* Animasi Parallax untuk Hero */
        @keyframes parallaxFloat {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(-30px) scale(1.05);
            }
        }

        /* Animasi Glow Effect */
        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.8);
            }
        }

        /* Animasi Wave untuk background */
        @keyframes wave {
            0% {
                transform: translateX(0) translateZ(0) scaleY(1);
            }

            50% {
                transform: translateX(-25%) translateZ(0) scaleY(0.55);
            }

            100% {
                transform: translateX(-50%) translateZ(0) scaleY(1);
            }
        }

        /* Card 3D Hover Effect */
        .card-3d {
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .card-3d:hover {
            transform: translateY(-15px) rotateX(5deg);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.08),
                0 0 60px rgba(59, 130, 246, 0.3);
        }

        /* Magnetic Button Effect */
        .btn-magnetic {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .btn-magnetic::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-magnetic:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-magnetic:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
        }

        /* Shimmer Loading Effect */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }

        .shimmer {
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 50%,
                    rgba(255, 255, 255, 0) 100%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }

        /* Pulse Animation untuk Badge */
        @keyframes pulse-ring {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
            }

            50% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        .pulse-badge {
            animation: pulse-ring 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
        }

        /* Text Gradient Animation */
        @keyframes textGradient {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .text-gradient-animated {
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa, #3b82f6, #2563eb);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textGradient 3s ease infinite;
        }

        /* Floating Elements */
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .float-animation:nth-child(2) {
            animation-delay: 1s;
        }

        .float-animation:nth-child(3) {
            animation-delay: 2s;
        }

        /* Reveal Animation */
        @keyframes reveal {
            from {
                opacity: 0;
                transform: translateY(100px) scale(0.9);
                filter: blur(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }

        .reveal-on-scroll {
            opacity: 0;
            animation: reveal 1s ease-out forwards;
        }

        /* Background Pattern Animation */
        .animated-bg {
            background:
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: movePattern 20s linear infinite;
        }

        @keyframes movePattern {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 50px 50px;
            }
        }

        /* Typing Effect */
        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent
            }
        }

        .typing-effect {
            overflow: hidden;
            border-right: 3px solid #2563eb;
            white-space: nowrap;
            animation: typing 3.5s steps(40, end), blink 0.75s step-end infinite;
        }
    </style>


</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white bg-opacity-70 backdrop-blur-lg shadow-sm fixed top-0 left-0 right-0 z-50 animate-fadeIn">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Logo dengan Shadow Hover -->
                <a href="{{ route('landing') }}" class="flex items-center space-x-3 animate-slideInLeft group">
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
                        class="flex items-center space-x-2 text-blue-700 font-semibold transition duration-300 hover:scale-105 hover:text-blue-900 group">
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
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-700 font-medium transition duration-300 hover:scale-105 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Tentang Kami</span>
                    </a>
                    <a href="{{ route('landing') }}#kontak"
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
                <a href="{{ route('landing') }}"
                    class="block text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="{{ route('promosi') }}"
                    class="block text-gray-700 hover:text-blue-600 font-medium">Promosi</a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Tentang
                    Kami</a>
                <a href="{{ route('landing') }}#kontak"
                    class="block text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
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
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($promotions as $index => $promo)
                    <div class="group relative bg-white rounded-2xl overflow-hidden card-3d opacity-0 reveal-on-scroll"
                        style="animation-delay: {{ $index * 0.15 }}s;">

                        <!-- Shimmer Effect Overlay -->
                        <div
                            class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none">
                        </div>

                        <!-- Image Container dengan Parallax -->
                        <div class="relative overflow-hidden h-56">
                            @if ($promo->foto)
                                <img src="{{ asset('storage/' . $promo->foto) }}" alt="{{ $promo->jenis_ikan }}"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <!-- Badge Tersedia dengan Pulse -->
                            <div class="absolute top-4 right-4 pulse-badge">
                                <div
                                    class="bg-gradient-to-r from-green-400 to-emerald-500 text-white px-4 py-1.5 rounded-full text-sm font-bold shadow-lg flex items-center space-x-1">
                                    <span class="w-2 h-2 bg-white rounded-full animate-ping"></span>
                                    <span>Tersedia</span>
                                </div>
                            </div>

                            <!-- Quick View Button - Muncul saat hover -->
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                                <a href="{{ route('promosi.show', $promo->id) }}"
                                    class="bg-white text-blue-600 px-6 py-2 rounded-full font-semibold shadow-xl hover:shadow-2xl transform hover:scale-110 transition-all duration-300">
                                    Quick View
                                </a>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 relative">
                            <!-- Animated Background Pattern -->
                            <div
                                class="absolute inset-0 animated-bg opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <div class="relative z-10">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $promo->jenis_ikan }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ $promo->deskripsi }}
                                </p>

                                <!-- Lokasi -->
                                <div
                                    class="flex items-center text-gray-500 text-sm mb-4 group-hover:text-blue-600 transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-medium">{{ $promo->lokasi ?? 'Riau' }}</span>
                                </div>

                                <!-- Price & Stock dengan animasi -->
                                <div
                                    class="flex items-center justify-between mb-5 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl group-hover:from-blue-100 group-hover:to-indigo-100 transition-all duration-300">
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Harga</p>
                                        <p class="text-lg font-bold text-gradient-animated">
                                            Rp {{ number_format($promo->harga, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-500">/kg</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500 mb-1">Stok</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $promo->stok_tersedia }}</p>
                                        <p class="text-xs text-gray-500">kg</p>
                                    </div>
                                </div>

                                <!-- Button Detail dengan Magnetic Effect -->
                                <a href="{{ route('promosi.show', $promo->id) }}"
                                    class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-xl font-semibold text-center btn-magnetic relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center justify-center">
                                        Lihat Detail
                                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- Decorative Corner -->
                        <div
                            class="absolute -bottom-2 -right-2 w-20 h-20 bg-blue-600 rounded-tl-full opacity-0 group-hover:opacity-10 transition-opacity duration-500">
                        </div>
                    </div>
                @empty
                    <!-- Empty State dengan animasi -->
                    <div class="col-span-full">
                        <div class="text-center py-16 reveal-on-scroll">
                            <div
                                class="inline-block p-12 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl shadow-2xl relative overflow-hidden">
                                <!-- Animated Background -->
                                <div class="absolute inset-0 animated-bg opacity-50"></div>

                                <div class="relative z-10">
                                    <svg class="w-32 h-32 text-blue-400 mx-auto mb-6 float-animation" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                    <h3 class="text-3xl font-bold text-gray-800 mb-3">Belum Ada Promosi</h3>
                                    <p class="text-gray-600 mb-6 text-lg">Jadilah yang pertama mempromosikan produk
                                        Anda!</p>
                                    <a href="{{ route('register') }}"
                                        class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl btn-magnetic">
                                        Mulai Berpromosi Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Tombol Lihat Semua -->
            @if ($promotions->count() > 0)
                <div class="text-center mt-12 animate-fadeInUp delay-500">
                    <a href="{{ route('promosi') }}"
                        class="inline-block px-8 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition duration-300 hover:scale-105">
                        Lihat Semua Promosi →
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- FITUR UNGGULAN SECTION -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">
                    Mengapa Memilih FishNote?
                </h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">
                    Platform terlengkap untuk mengelola dan memasarkan hasil budidaya perikanan Anda
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Fitur 1 -->
                <div class="group relative p-8 bg-white rounded-2xl card-3d feature-card text-center">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-6 float-animation group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                            Mudah Digunakan</h3>
                        <p class="text-gray-600 leading-relaxed">Interface yang user-friendly memudahkan peternak dalam
                            mengelola bisnis</p>

                        <!-- Decorative Line -->
                        <div
                            class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto transition-all duration-500">
                        </div>
                    </div>
                </div>

                <!-- Fitur 2 -->
                <div class="group relative p-8 bg-white rounded-2xl card-3d feature-card text-center">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-6 float-animation group-hover:scale-110 transition-transform duration-500"
                            style="animation-delay: 0.2s;">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors duration-300">
                            Harga Kompetitif</h3>
                        <p class="text-gray-600 leading-relaxed">Dapatkan harga terbaik langsung dari peternak tanpa
                            perantara</p>

                        <div
                            class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mx-auto transition-all duration-500">
                        </div>
                    </div>
                </div>

                <!-- Fitur 3 -->
                <div class="group relative p-8 bg-white rounded-2xl card-3d feature-card text-center">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10">
                        <div class="w-24 h-24 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-full flex items-center justify-center mx-auto mb-6 float-animation group-hover:scale-110 transition-transform duration-500"
                            style="animation-delay: 0.4s;">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition-colors duration-300">
                            Proses Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">Transaksi dan pencatatan dilakukan secara real-time
                            dan efisien</p>

                        <div
                            class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-yellow-500 to-amber-500 rounded-full mx-auto transition-all duration-500">
                        </div>
                    </div>
                </div>

                <!-- Fitur 4 -->
                <div class="group relative p-8 bg-white rounded-2xl card-3d feature-card text-center">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10">
                        <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full flex items-center justify-center mx-auto mb-6 float-animation group-hover:scale-110 transition-transform duration-500"
                            style="animation-delay: 0.6s;">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors duration-300">
                            Aman & Terpercaya</h3>
                        <p class="text-gray-600 leading-relaxed">Data dan transaksi Anda dijamin aman dengan sistem
                            keamanan terbaik</p>

                        <div
                            class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto transition-all duration-500">
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- CARA KERJA SECTION -->
    <section class="bg-gradient-to-b from-gray-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">
                    Cara Kerja FishNote
                </h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">
                    Mulai bisnis perikanan Anda hanya dengan 3 langkah mudah
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div
                    class="relative p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 step-card">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 step-badge">
                        <div
                            class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold shadow-lg">
                            1
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <div
                            class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6 step-icon-wrapper">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Daftar Gratis</h3>
                        <p class="text-gray-600">Buat akun FishNote secara gratis dalam hitungan menit. Tidak ada biaya
                            tersembunyi!</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div
                    class="relative p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 step-card">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 step-badge">
                        <div
                            class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold shadow-lg">
                            2
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <div
                            class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 step-icon-wrapper">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kelola Data</h3>
                        <p class="text-gray-600">Catat hasil budidaya, kelola stok, dan pantau perkembangan bisnis Anda
                            dengan mudah</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div
                    class="relative p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 step-card">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 step-badge">
                        <div
                            class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold shadow-lg">
                            3
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <div
                            class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6 step-icon-wrapper">
                            <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pasarkan Produk</h3>
                        <p class="text-gray-600">Buat promosi dan jangkau ribuan pembeli potensial di seluruh Indonesia
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('register') }}"
                    class="inline-block px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    Mulai Sekarang →
                </a>
            </div>
        </div>
    </section>

    <!-- STATISTIK SECTION -->
    <section class="bg-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fadeInUp">
                    Dipercaya oleh Ribuan Peternak
                </h2>
                <p class="text-blue-100 text-lg animate-fadeInUp delay-100">
                    Bergabunglah dengan komunitas peternak ikan terbesar di Indonesia
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center animate-fadeInUp">
                    <div class="text-5xl font-bold mb-2">500+</div>
                    <div class="text-blue-100">Peternak Aktif</div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center animate-fadeInUp delay-100">
                    <div class="text-5xl font-bold mb-2">10K+</div>
                    <div class="text-blue-100">Transaksi Sukses</div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center animate-fadeInUp delay-200">
                    <div class="text-5xl font-bold mb-2">50+</div>
                    <div class="text-blue-100">Jenis Ikan</div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center animate-fadeInUp delay-300">
                    <div class="text-5xl font-bold mb-2">98%</div>
                    <div class="text-blue-100">Kepuasan Pengguna</div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONI SECTION -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">
                    Apa Kata Mereka?
                </h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">
                    Testimoni dari peternak yang telah sukses menggunakan FishNote
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimoni 1 -->
                <div
                    class="bg-gray-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 animate-fadeInUp">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "FishNote sangat membantu saya dalam mengelola budidaya lele. Sekarang semua data tersimpan rapi
                        dan saya bisa promosi langsung ke pembeli!"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            AA
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Aidil Ardiansyah</div>
                            <div class="text-sm text-gray-500">Peternak Lele - Bengkalis</div>
                        </div>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div
                    class="bg-gray-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 animate-fadeInUp delay-100">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "Platform yang sangat user-friendly! Penjualan ikan nila saya meningkat 40% sejak menggunakan
                        FishNote. Highly recommended!"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            UJ
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Ujang</div>
                            <div class="text-sm text-gray-500">Peternak Nila - Bengkalis</div>
                        </div>
                    </div>
                </div>

                <!-- Testimoni 3 -->
                <div
                    class="bg-gray-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 animate-fadeInUp delay-200">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "Fitur pencatatan dan laporan sangat membantu untuk menganalisis bisnis. FishNote adalah solusi
                        terbaik untuk peternak modern!"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            MM
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Mamat</div>
                            <div class="text-sm text-gray-500">Peternak Gurame - Bengkalis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="bg-gray-50 py-20">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fadeInUp">
                    Pertanyaan yang Sering Ditanyakan
                </h2>
                <p class="text-gray-600 text-lg animate-fadeInUp delay-100">
                    Temukan jawaban untuk pertanyaan umum tentang FishNote
                </p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 animate-fadeInUp">
                    <button class="w-full px-6 py-5 text-left flex justify-between items-center"
                        onclick="toggleFAQ(1)">
                        <span class="font-bold text-gray-900">Apakah FishNote gratis?</span>
                        <svg id="faq-icon-1" class="w-6 h-6 text-blue-600 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="faq-content-1" class="hidden px-6 pb-5 text-gray-600">
                        Ya, FishNote sepenuhnya gratis untuk semua peternak. Anda dapat mendaftar, mengelola data, dan
                        membuat promosi tanpa biaya apapun.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 animate-fadeInUp delay-100">
                    <button class="w-full px-6 py-5 text-left flex justify-between items-center"
                        onclick="toggleFAQ(2)">
                        <span class="font-bold text-gray-900">Bagaimana cara membuat promosi?</span>
                        <svg id="faq-icon-2" class="w-6 h-6 text-blue-600 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="faq-content-2" class="hidden px-6 pb-5 text-gray-600">
                        Setelah mendaftar, Anda dapat masuk ke dashboard peternak dan pilih menu "Promosi". Isi detail
                        produk, upload foto, dan promosi Anda akan langsung tayang di halaman utama.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 animate-fadeInUp delay-200">
                    <button class="w-full px-6 py-5 text-left flex justify-between items-center"
                        onclick="toggleFAQ(3)">
                        <span class="font-bold text-gray-900">Apakah data saya aman?</span>
                        <svg id="faq-icon-3" class="w-6 h-6 text-blue-600 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="faq-content-3" class="hidden px-6 pb-5 text-gray-600">
                        Tentu! Kami menggunakan sistem keamanan tingkat enterprise dengan enkripsi data. Semua informasi
                        pribadi dan bisnis Anda dijamin aman.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 animate-fadeInUp delay-300">
                    <button class="w-full px-6 py-5 text-left flex justify-between items-center"
                        onclick="toggleFAQ(4)">
                        <span class="font-bold text-gray-900">Bagaimana cara menghubungi pembeli?</span>
                        <svg id="faq-icon-4" class="w-6 h-6 text-blue-600 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="faq-content-4" class="hidden px-6 pb-5 text-gray-600">
                        Pembeli yang tertarik akan menghubungi Anda melalui nomor kontak yang Anda cantumkan di promosi.
                        Anda juga bisa melihat statistik views untuk setiap promosi.
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

    <script>
        function toggleFAQ(id) {
            const content = document.getElementById(`faq-content-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>

    <script>
        // Intersection Observer untuk animasi saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, observerOptions);

            // Observe semua feature cards
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>

    <script>
        // Intersection Observer untuk animasi saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, observerOptions);

            // Observe semua feature cards
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                observer.observe(card);
            });

            // Observe semua step cards
            const stepCards = document.querySelectorAll('.step-card');
            stepCards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal-on-scroll');

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.animation = 'reveal 1s ease-out forwards';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(element => {
                revealObserver.observe(element);
            });

            // Feature Cards Animation
            const featureCards = document.querySelectorAll('.feature-card');
            const cardObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, {
                threshold: 0.2
            });

            featureCards.forEach(card => {
                cardObserver.observe(card);
            });

            // Step Cards Animation
            const stepCards = document.querySelectorAll('.step-card');
            stepCards.forEach(card => {
                cardObserver.observe(card);
            });
        });

        // Magnetic Button Effect untuk semua button dengan class btn-magnetic
        document.querySelectorAll('.btn-magnetic').forEach(button => {
            button.addEventListener('mousemove', (e) => {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                button.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) scale(1.05)`;
            });

            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translate(0, 0) scale(1)';
            });
        });
    </script>

</body>

</html>
