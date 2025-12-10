<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FishNote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background Image dengan Overlay Biru Transparan */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('template/img/bg3.jpg') }}');;
            background-size: cover;
            background-position: center;
            z-index: -2;
        }

        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.90) 100%);
            z-index: -1;
        }

        /* Animasi Fade In */
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

        .login-container {
            animation: fadeInUp 0.6s ease-out;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 480px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
        }

        /* Tombol Close (X) */
        .btn-close-custom {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            text-decoration: none;
            color: white;
            font-size: 20px;
            backdrop-filter: blur(10px);
        }

        .btn-close-custom:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg) scale(1.1);
            color: white;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .logo-icon i {
            font-size: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-text {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
        }

        .subtitle-text {
            font-size: 14px;
            opacity: 0.9;
            position: relative;
        }

        .login-body {
            padding: 40px 35px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: #f8f9ff;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 14px;
            font-weight: 700;
            font-size: 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 25px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider span {
            padding: 0 15px;
            color: #999;
            font-size: 14px;
        }

        .register-link {
            color: #667eea;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Alert Styling */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 14px 18px;
            font-size: 14px;
            animation: slideDown 0.4s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Floating Decorations -->
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="decoration decoration-3"></div>

    <div class="container">
        <div class="login-container">
            <div class="login-card mx-auto">
                <!-- Header dengan Welcome Text -->
                <div class="login-header">
                    <!-- Tombol Close (X) -->
                    <a href="{{ route('landing') }}" class="btn-close-custom" title="Kembali ke Beranda">
                        <i class="fas fa-times"></i>
                    </a>
                    <h1 class="welcome-text">Selamat Datang!</h1>
                    <p class="subtitle-text mb-0">Masuk ke akun FishNote Anda</p>
                </div>
                
                <div class="login-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-envelope me-1"></i> Email
                            </label>
                            <div class="input-icon">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" placeholder="Masukkan email Anda" required>
                                <i class="fas fa-user"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-lock me-1"></i> Password
                            </label>
                            <div class="input-icon">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Masukkan password Anda" required>
                                <i class="fas fa-key"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>
                            <a href="#" class="text-decoration-none" style="color: #667eea; font-size: 14px;">
                                <i class="fas fa-question-circle me-1"></i>Lupa Password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i> Masuk Sekarang
                        </button>

                        <div class="divider">
                            <span>ATAU</span>
                        </div>

                        <div class="text-center">
                            <p class="mb-0" style="color: #666;">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="register-link">
                                    Daftar Sekarang <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Footer Info -->
                <div class="text-center pb-4">
                    <p class="mb-0" style="font-size: 12px; color: #999;">
                        <i class="fas fa-shield-alt me-1"></i> Login Aman & Terenkripsi
                    </p>
                </div>
            </div>

            <!-- Branding Footer -->
            <div class="text-center mt-4">
                <p style="color: white; font-weight: 600; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                    <i class="fas fa-fish me-2"></i>FishNote
                </p>
                <p style="color: rgba(255,255,255,0.8); font-size: 14px;">Pencatatan dan Promosi Hasil Budidaya Perikanan</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>