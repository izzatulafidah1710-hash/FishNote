<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FishNote</title>
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
        .glass-nav {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        @keyframes modalPop {
            0% {
                opacity: 0;
                transform: scale(0.94) translateY(10px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .animate-modalPop {
            animation: modalPop 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-hidden">

    <!-- LANDING PAGE BACKGROUND CONTENT (Website Utama) -->
    <div class="fixed inset-0 overflow-y-auto pointer-events-none filter blur-[4px]">
        <!-- NAVBAR -->
        <nav class="glass-nav border-b border-slate-100 fixed top-0 left-0 right-0 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center group py-1">
                        <img src="{{ asset('template/img/logo1.png') }}?v={{ time() }}" alt="FishNote Logo" class="h-10 sm:h-12 w-auto object-contain">
                    </div>
                    <div class="hidden md:flex items-center justify-end flex-1 space-x-9 text-sm font-semibold text-slate-600">
                        <span class="text-brand-600 font-bold">Beranda</span>
                        <span>Promosi</span>
                        <span>Tentang Kami</span>
                        <span>Kontak</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- HERO SECTION -->
        <section class="relative pt-32 pb-20 bg-gradient-to-b from-blue-50/70 via-slate-50 to-white text-slate-800 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 leading-tight">
                            Kelola & Pasarkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600">Budidaya Ikan</span> Dengan Cara Baru
                        </h1>
                        <p class="text-slate-600 text-lg">
                            Platform digital yang membantu peternak ikan lokal mencatat panen dan mempromosikan hasil perikanan secara langsung kepada pembeli.
                        </p>
                    </div>
                    <div class="lg:col-span-5 flex justify-center relative">
                        <div class="w-72 h-72 bg-sky-200/80 rounded-full blur-2xl absolute"></div>
                        <img src="{{ asset('images/farmer_cutout.png') }}?v={{ time() }}" alt="Peternak FishNote" class="w-80 h-auto relative z-10">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- BACKDROP BLUR OVERLAY (Latar Belakang Gelap Transparan di Atas Web Utama) -->
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100]" onclick="window.location.href='{{ route('landing') }}'"></div>

    <!-- FLOATING MODAL DIALOG -->
    <div class="fixed inset-0 z-[110] flex items-center justify-center p-4 sm:p-6 overflow-y-auto pointer-events-none">
        <div class="w-full max-w-[420px] pointer-events-auto animate-modalPop my-auto">
            <div class="bg-white rounded-[32px] shadow-2xl p-8 sm:p-10 relative border border-slate-100/50">
                
                <!-- Close Button (X) -->
                <a href="{{ route('landing') }}" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-500 flex items-center justify-center transition" title="Tutup">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </a>

                <!-- Icon Badge Centered -->
                <div class="w-16 h-16 bg-brand-50 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <img src="{{ asset('template/img/logofishnote.png') }}?v={{ time() }}" alt="FishNote Logo" class="h-9 w-auto object-contain drop-shadow-sm">
                </div>

                <!-- Title & Subtitle -->
                <div class="text-center mb-8">
                    <h3 class="text-[26px] font-black text-slate-900 tracking-tight mb-2">Selamat Datang</h3>
                    <p class="text-slate-500 text-[13px] font-medium leading-relaxed">Silakan masuk menggunakan email dan password akun FishNote Anda.</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 text-[13px] font-semibold rounded-2xl flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-emerald-500 text-base mt-0.5"></i>
                        <span class="leading-relaxed">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-700 text-[13px] font-semibold rounded-2xl flex items-start gap-3">
                        <i class="fa-solid fa-circle-exclamation text-red-500 text-base mt-0.5"></i>
                        <span class="leading-relaxed">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-widest mb-2">
                            Alamat Email
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="Contoh: user@email.com"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-semibold text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition @error('email') border-red-500 focus:ring-red-500/10 @enderror">
                        @error('email')
                            <p class="mt-2 text-[12px] text-red-500 font-bold"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-[11px] font-extrabold text-slate-700 uppercase tracking-widest">
                                Password
                            </label>
                            <a href="#" class="text-[11px] font-bold text-brand-600 hover:text-brand-700 transition">Lupa Sandi?</a>
                        </div>
                        <input type="password" name="password" required
                            placeholder="••••••••"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-semibold text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition @error('password') border-red-500 focus:ring-red-500/10 @enderror">
                        @error('password')
                            <p class="mt-2 text-[12px] text-red-500 font-bold"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-brand-600 border-slate-300 rounded focus:ring-brand-500 cursor-pointer">
                        <label for="remember" class="ml-2.5 text-[13px] text-slate-600 font-medium cursor-pointer">Ingat Saya</label>
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-[14px] rounded-xl shadow-xl shadow-brand-600/20 hover:shadow-brand-600/40 hover:-translate-y-0.5 transition-all duration-200 mt-2 flex items-center justify-center gap-2">
                        Masuk Sekarang <i class="fa-solid fa-arrow-right-to-bracket text-xs opacity-70"></i>
                    </button>
                </form>

                <div class="mt-8 text-center text-[13px] text-slate-500 font-medium">
                    Belum bergabung? 
                    <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:text-brand-700 hover:underline">
                        Daftar Akun Baru
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>