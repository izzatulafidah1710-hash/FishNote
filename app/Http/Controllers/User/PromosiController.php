<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Promosi::query();

        // Sementara menggunakan user_id = 1 (sebelum ada login)
        $query->where('user_id', 1);

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis ikan
        if ($request->filled('jenis_ikan')) {
            $query->where('jenis_ikan', $request->jenis_ikan);
        }

        $promosi = $query->orderBy('created_at', 'desc')->paginate(10);

        // Statistik
        $totalPromosi = Promosi::where('user_id', 1)->count();
        $promosiAktif = Promosi::where('user_id', 1)->where('status', 'Aktif')->count();
        $totalViews = Promosi::where('user_id', 1)->sum('views') ?? 0;

        return view('user.promosi.index', compact('promosi', 'totalPromosi', 'promosiAktif', 'totalViews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.promosi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_promosi' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:Kg,Ekor',
            'stok_tersedia' => 'required|integer|min:1',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Habis',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Sementara menggunakan user_id = 1
        $validated['user_id'] = 1;
        $validated['views'] = 0;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto'] = $file->storeAs('promosi', $filename, 'public');
        }

        Promosi::create($validated);

        return redirect()->route('user.promosi.index')
            ->with('success', 'Promosi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promosi $promosi)
    {
        // Increment views
        $promosi->incrementViews();

        return view('user.promosi.show', compact('promosi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promosi $promosi)
    {
        return view('user.promosi.edit', compact('promosi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promosi $promosi)
    {
        $validated = $request->validate([
            'judul_promosi' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:Kg,Ekor',
            'stok_tersedia' => 'required|integer|min:0',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Habis',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($promosi->foto) {
                Storage::disk('public')->delete($promosi->foto);
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto'] = $file->storeAs('promosi', $filename, 'public');
        }

        $promosi->update($validated);

        return redirect()->route('user.promosi.index')
            ->with('success', 'Promosi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promosi $promosi)
    {
        // Hapus foto jika ada
        if ($promosi->foto) {
            Storage::disk('public')->delete($promosi->foto);
        }

        $promosi->delete();

        return redirect()->route('user.promosi.index')
            ->with('success', 'Promosi berhasil dihapus');
    }
}