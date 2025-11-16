<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    // TAMPILKAN SEMUA PROMOSI
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.promotion.create');
    }

    // SIMPAN DATA PROMOSI
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filePath = null;

        if ($request->hasFile('gambar')) {
            $filePath = $request->file('gambar')->store('promotions', 'public');
        }

        Promotion::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filePath
        ]);

        return redirect()->route('promotions.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotion.edit', compact('promotion'));
    }

    // UPDATE DATA PROMOSI
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $promotion = Promotion::findOrFail($id);

        $filePath = $promotion->gambar;

        // jika upload gambar baru, hapus gambar lama
        if ($request->hasFile('gambar')) {
            if ($promotion->gambar && Storage::disk('public')->exists($promotion->gambar)) {
                Storage::disk('public')->delete($promotion->gambar);
            }
            $filePath = $request->file('gambar')->store('promotions', 'public');
        }

        $promotion->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filePath
        ]);

        return redirect()->route('promotions.index')->with('success', 'Data berhasil diperbarui!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        if ($promotion->gambar && Storage::disk('public')->exists($promotion->gambar)) {
            Storage::disk('public')->delete($promotion->gambar);
        }

        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Data berhasil dihapus!');
    }
}
