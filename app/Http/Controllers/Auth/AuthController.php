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
    // Halaman Login
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
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

    // Halaman Register (Khusus Peternak)
    public function showRegisterForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.register');
    }

    // Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:residents',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'farm_location' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // 1. Buat data resident (peternak)
            $resident = Resident::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'farm_location' => $request->farm_location,
            ]);

            // 2. Buat user dengan role peternak
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'peternak',
                'resident_id' => $resident->id,
            ]);

            DB::commit();

            // Auto login
            Auth::login($user);

            // Redirect ke dashboard user
            return redirect()->route('user.dashboarduser')
                ->with('success', 'Registrasi berhasil! Selamat datang di FishNote.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }

    // FUNGSI PENTING: Redirect berdasarkan role
    private function redirectBasedOnRole()
    {
        $user = Auth::user();

        // Jika admin → redirect ke admin dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboardadmin')
                ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Jika peternak → redirect ke user dashboard
        if ($user->role === 'peternak') {
            return redirect()->route('user.dashboarduser')
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        // Jika role tidak dikenali (fallback)
        Auth::logout();
        return redirect()->route('login')
            ->with('error', 'Role tidak valid. Silakan hubungi administrator.');
    }
}