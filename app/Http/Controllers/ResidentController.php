<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan semua data peternak
     */
    public function index()
    {
        // Ambil data residents dengan relasi user
        $residents = Resident::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.resident.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     * Form tambah peternak baru (Admin yang input)
     */
    public function create()
    {
        return view('admin.resident.create');
    }

    /**
     * Store a newly created resource in storage.
     * Simpan data peternak baru
     * PENTING: Harus buat User dulu, baru Resident!
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email|unique:residents,email',
            'password'      => 'required|string|min:6',
            'phone'         => 'required|string|max:20',
            'address'       => 'nullable|string',
            'farm_location' => 'nullable|string|max:255',
            'jenis_usaha'   => 'nullable|string|max:100',
            'luas_lahan'    => 'nullable|numeric',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'phone.required' => 'Nomor telepon wajib diisi',
        ]);

        DB::beginTransaction();
        
        try {
            // 1. Buat User terlebih dahulu
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'peternak',
            ]);

            // 2. Buat Resident dengan user_id
            Resident::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
                'farm_location' => $validated['farm_location'] ?? null,
                'jenis_usaha' => $validated['jenis_usaha'] ?? null,
                'luas_lahan' => $validated['luas_lahan'] ?? null,
                'status' => 'aktif',
            ]);

            DB::commit();

            return redirect()->route('admin.datapeternak.index')
                ->with('success', 'Data peternak berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * Detail peternak (opsional)
     */
    public function show($id)
    {
        $resident = Resident::with('user')->findOrFail($id);
        return view('admin.resident.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     * Form edit peternak
     */
    public function edit($id)
    {
        $resident = Resident::with('user')->findOrFail($id);
        return view('admin.resident.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     * Update data peternak dan user-nya
     */
    public function update(Request $request, $id)
    {
        $resident = Resident::with('user')->findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $resident->user_id . '|unique:residents,email,' . $resident->id,
            'phone'         => 'required|string|max:20',
            'address'       => 'nullable|string',
            'farm_location' => 'nullable|string|max:255',
            'jenis_usaha'   => 'nullable|string|max:100',
            'luas_lahan'    => 'nullable|numeric',
            'status'        => 'required|in:aktif,nonaktif',
            'password'      => 'nullable|string|min:6', // Password opsional saat edit
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'phone.required' => 'Nomor telepon wajib diisi',
            'status.required' => 'Status wajib dipilih',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        DB::beginTransaction();
        
        try {
            // 1. Update User
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ];

            // Update password jika diisi
            if (!empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            $resident->user->update($userData);

            // 2. Update Resident
            $resident->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
                'farm_location' => $validated['farm_location'] ?? null,
                'jenis_usaha' => $validated['jenis_usaha'] ?? null,
                'luas_lahan' => $validated['luas_lahan'] ?? null,
                'status' => $validated['status'],
            ]);

            DB::commit();

            return redirect()->route('admin.datapeternak.index')
                ->with('success', 'Data peternak berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * Hapus peternak DAN user-nya
     */
    public function delete($id)
    {
        $resident = Resident::with('user')->findOrFail($id);
        
        DB::beginTransaction();
        
        try {
            $name = $resident->name;
            
            // Hapus User (Resident akan otomatis terhapus karena cascade)
            if ($resident->user) {
                $resident->user->delete();
            }
            
            DB::commit();

            return redirect()->route('admin.datapeternak.index')
                ->with('success', "Data peternak {$name} berhasil dihapus");

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Method tambahan untuk destroy (Laravel resource route)
     */
    public function destroy($id)
    {
        return $this->delete($id);
    }
}