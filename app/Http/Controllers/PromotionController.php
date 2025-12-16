<?php

namespace App\Http\Controllers;

use App\Models\Promosi; // GANTI dari Promotion ke Promosi
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Tampilkan semua promosi dari semua peternak
     */
    public function index()
    {
        // Ambil semua promosi dengan relasi resident dan user
        $promotions = Promosi::with(['resident', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Form tambah promosi (Admin input untuk peternak tertentu)
     */
    public function create()
    {
        // Ambil semua peternak untuk dropdown
        $residents = Resident::with('user')
            ->where('status', 'aktif')
            ->orderBy('name')
            ->get();

        return view('admin.promotion.create', compact('residents'));
    }

    /**
     * Simpan data promosi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'judul_promosi' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:Kg,Ekor',
            'stok_tersedia' => 'required|integer|min:0',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Habis',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'resident_id.required' => 'Pilih peternak terlebih dahulu',
            'judul_promosi.required' => 'Judul promosi wajib diisi',
            'jenis_ikan.required' => 'Jenis ikan wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'stok_tersedia.required' => 'Stok wajib diisi',
            'kontak.required' => 'Kontak wajib diisi',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
            'tanggal_berakhir.required' => 'Tanggal berakhir wajib diisi',
            'tanggal_berakhir.after_or_equal' => 'Tanggal berakhir harus setelah tanggal mulai',
        ]);

        // Ambil resident untuk mendapatkan user_id
        $resident = Resident::findOrFail($request->resident_id);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('promosi', 'public');
        }

        // Simpan promosi
        Promosi::create([
            'user_id' => $resident->user_id,
            'resident_id' => $request->resident_id,
            'judul_promosi' => $request->judul_promosi,
            'jenis_ikan' => $request->jenis_ikan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok_tersedia' => $request->stok_tersedia,
            'lokasi' => $request->lokasi ?? $resident->farm_location,
            'kontak' => $request->kontak ?? $resident->phone,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status' => $request->status,
            'foto' => $fotoPath,
            'views' => 0,
        ]);

        return redirect()->route('admin.datapromosi.index')
            ->with('success', 'Promosi berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail promosi
     */
    public function show($id)
    {
        $promotion = Promosi::with(['resident', 'user'])->findOrFail($id);
        return view('admin.promotion.show', compact('promotion'));
    }

    /**
     * Form edit promosi
     */
    public function edit($id)
    {
        $promotion = Promosi::with('resident')->findOrFail($id);
        $residents = Resident::with('user')
            ->where('status', 'aktif')
            ->orderBy('name')
            ->get();

        return view('admin.promotion.edit', compact('promotion', 'residents'));
    }

    /**
     * Update data promosi
     */
    public function update(Request $request, $id)
    {
        $promotion = Promosi::findOrFail($id);

        $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'judul_promosi' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:Kg,Ekor',
            'stok_tersedia' => 'required|integer|min:0',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Habis',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil resident untuk update user_id jika resident berubah
        $resident = Resident::findOrFail($request->resident_id);

        // Upload foto baru jika ada
        $fotoPath = $promotion->foto;
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($promotion->foto && Storage::disk('public')->exists($promotion->foto)) {
                Storage::disk('public')->delete($promotion->foto);
            }
            $fotoPath = $request->file('foto')->store('promosi', 'public');
        }

        // Update promosi
        $promotion->update([
            'user_id' => $resident->user_id,
            'resident_id' => $request->resident_id,
            'judul_promosi' => $request->judul_promosi,
            'jenis_ikan' => $request->jenis_ikan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok_tersedia' => $request->stok_tersedia,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status' => $request->status,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.datapromosi.index')
            ->with('success', 'Promosi berhasil diperbarui!');
    }

    /**
     * Hapus promosi
     */
    public function destroy($id)
    {
        $promotion = Promosi::findOrFail($id);

        // Hapus foto jika ada
        if ($promotion->foto && Storage::disk('public')->exists($promotion->foto)) {
            Storage::disk('public')->delete($promotion->foto);
        }

        $promotion->delete();

        return redirect()->route('admin.datapromosi.index')
            ->with('success', 'Promosi berhasil dihapus!');
    }

    /**
     * Toggle status promosi (Aktif/Tidak Aktif)
     */
    public function toggleStatus($id)
    {
        $promotion = Promosi::findOrFail($id);
        
        $newStatus = $promotion->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $promotion->update(['status' => $newStatus]);

        return redirect()->back()
            ->with('success', "Status promosi berhasil diubah menjadi {$newStatus}");
    }
}