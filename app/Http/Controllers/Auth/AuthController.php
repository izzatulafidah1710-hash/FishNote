<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Halaman Login
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            return $this->redirectBasedOnRole();
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);
    }

    /**
     * Halaman Register (Khusus Peternak)
     */
    public function showRegisterForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.register');
    }

    /**
     * Proses Register
     * PENTING: User dibuat dulu, baru Resident!
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email|unique:residents,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:20', // WAJIB untuk peternak
            'address' => 'nullable|string',
            'farm_location' => 'nullable|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'phone.required' => 'Nomor telepon wajib diisi',
        ]);

        DB::beginTransaction();
        
        try {
            // ✅ LANGKAH 1: Buat User terlebih dahulu
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'peternak', // Default role untuk registrasi
            ]);

            // ✅ LANGKAH 2: Buat Resident dengan user_id dari User yang baru dibuat
            Resident::create([
                'user_id' => $user->id, // ← INI YANG BENAR!
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'farm_location' => $request->farm_location,
                'status' => 'aktif', // Default status aktif
            ]);

            DB::commit();

            // TIDAK AUTO LOGIN - Redirect ke halaman login
            return redirect()->route('login')
                ->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log error untuk debugging
            \Log::error('Registration failed: ' . $e->getMessage());
            
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')
            ->with('success', 'Anda telah logout.');
    }

    /**
     * FUNGSI PENTING: Redirect berdasarkan role
     */
    private function redirectBasedOnRole()
    {
        $user = Auth::user();

        // Jika admin → redirect ke admin dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Jika peternak → redirect ke user dashboard
        if ($user->role === 'peternak') {
            return redirect()->route('user.dashboard')
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        // Jika role tidak dikenali (fallback)
        Auth::logout();
        return redirect()->route('login')
            ->with('error', 'Role tidak valid. Silakan hubungi administrator.');
    }
}