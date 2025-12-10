<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FishNote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 40px 0;
        }

        /* Background Image dengan Overlay Biru Transparan */
        body::before {
            content: '';
            position: fixed;
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
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.88) 0%, rgba(118, 75, 162, 0.92) 100%);
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

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .register-container {
            animation: fadeInUp 0.6s ease-out;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 700px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }

        .register-header::before {
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

        .register-body {
            padding: 40px 35px;
            max-height: 70vh;
            overflow-y: auto;
        }

        /* Custom Scrollbar */
        .register-body::-webkit-scrollbar {
            width: 8px;
        }

        .register-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .register-body::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .register-body::-webkit-scrollbar-thumb:hover {
            background: #764ba2;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .required-badge {
            color: #e74c3c;
            font-size: 12px;
            font-weight: 700;
        }

        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
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

        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 14px;
            font-weight: 700;
            font-size: 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
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

        .login-link {
            color: #667eea;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link:hover {
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

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* Step Indicator */
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #999;
            transition: all 0.3s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        /* Feature Badge */
        .feature-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-radius: 20px;
            font-size: 13px;
            color: #667eea;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .feature-badge i {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Floating Decorations -->
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="decoration decoration-3"></div>

    <div class="container">
        <div class="register-container">
            <div class="register-card mx-auto">
                <!-- Header -->
                <div class="register-header">
                    <!-- Tombol Close (X) -->
                    <a href="{{ route('login') }}" class="btn-close-custom" title="Kembali ke Beranda">
                        <i class="fas fa-times"></i>
                    </a>
                    <h1 class="welcome-text">Bergabung dengan FishNote</h1>
                    <p class="subtitle-text mb-0">Daftar dan mulai pencatatan kelola promosi perikanan Anda</p>
                </div>
                
                <div class="register-body">

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Oops! Ada yang salah:</strong>
                            <ul class="mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        
                        <!-- Personal Info Section -->
                        <h6 class="text-muted mb-3 fw-bold">
                            <i class="fas fa-user-circle me-2"></i>Informasi Pribadi
                        </h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="fas fa-user me-1"></i> Nama Lengkap 
                                    <span class="required-badge">*</span>
                                </label>
                                <div class="input-icon">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                    <i class="fas fa-signature"></i>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="fas fa-envelope me-1"></i> Email 
                                    <span class="required-badge">*</span>
                                </label>
                                <div class="input-icon">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" placeholder="email@example.com" required>
                                    <i class="fas fa-at"></i>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="fas fa-lock me-1"></i> Password 
                                    <span class="required-badge">*</span>
                                </label>
                                <div class="input-icon">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                           placeholder="Min. 6 karakter" required>
                                    <i class="fas fa-key"></i>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>Minimal 6 karakter
                                </small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="fas fa-lock me-1"></i> Konfirmasi Password 
                                    <span class="required-badge">*</span>
                                </label>
                                <div class="input-icon">
                                    <input type="password" name="password_confirmation" class="form-control" 
                                           placeholder="Ulangi password" required>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-phone me-1"></i> Nomor Telepon
                                <span class="required-badge">*</span>
                            </label>
                            <div class="input-icon">
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone') }}" placeholder="08**********" required>
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>Format: 08********** (isi nomor anda yang masih aktif)
                            </small>
                        </div>

                        <!-- Farm Info Section -->
                        <h6 class="text-muted mb-3 mt-4 fw-bold">
                            <i class="fas fa-fish me-2"></i>Informasi Budidaya
                        </h6>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt me-1"></i> Alamat Lengkap
                            </label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" 
                                      rows="2" placeholder="Jl.Awang Mahmuda Desa Sungai Alam">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="fas fa-water me-1"></i> Lokasi Budidaya
                            </label>
                            <div class="input-icon">
                                <input type="text" name="farm_location" class="form-control @error('farm_location') is-invalid @enderror" 
                                       value="{{ old('farm_location') }}" placeholder="Contoh: Kolam Desa Sungai Alam">
                                <i class="fas fa-map-pin"></i>
                            </div>
                            @error('farm_location')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Terms -->
                        <div class="alert" style="background: linear-gradient(135deg, #e8f4fd 0%, #d9edf7 100%); color: #31708f; border-radius: 12px;">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label" for="terms" style="font-size: 13px;">
                                    Saya setuju dengan <a href="#" class="fw-bold text-decoration-none">Syarat & Ketentuan</a> 
                                    serta <a href="#" class="fw-bold text-decoration-none">Kebijakan Privasi</a> FishNote
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-register w-100 mb-3">
                            <i class="fas fa- me-2"></i> Daftar Sekarang
                        </button>

                        <div class="divider">
                            <span>ATAU</span>
                        </div>

                        <div class="text-center">
                            <p class="mb-0" style="color: #666;">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="login-link">
                                    Login di sini <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Footer Info -->
                <div class="text-center pb-4 px-4">
                    <div class="d-flex justify-content-center gap-4 flex-wrap" style="font-size: 12px; color: #999;">
                        <span><i class="fas fa-shield-alt me-1"></i>Data Terenkripsi</span>
                        <span><i class="fas fa-lock me-1"></i>Akun Aman</span>
                        <span><i class="fas fa-headset me-1"></i>Support 24/7</span>
                    </div>
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