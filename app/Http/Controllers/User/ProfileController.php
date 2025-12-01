<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // Halaman profile
    public function index()
    {
        $user = Auth::user();
        $resident = $user->resident;
        
        return view('user.profile.index', compact('user', 'resident'));
    }

    // Halaman edit profile
    public function edit()
    {
        $user = Auth::user();
        $resident = $user->resident;
        
        return view('user.profile.edit', compact('user', 'resident'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();
        $resident = $user->resident;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|unique:residents,email,' . $resident->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'farm_location' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Update resident
            $resident->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'farm_location' => $request->farm_location,
            ]);

            DB::commit();

            return redirect()->route('user.profile')
                ->with('success', 'Profile berhasil diperbarui!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.profile')
            ->with('success', 'Password berhasil diubah!');
    }
}