<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use Illuminate\Http\Request;

class PromosiPublicController extends Controller
{
    /**
     * Halaman Landing - Tampilkan 8 promosi terbaru
     */
    public function landing()
    {
        // Ambil 8 promosi terbaru yang aktif untuk landing page
        $promotions = Promosi::where('status', 'Aktif')
                            ->orderBy('created_at', 'desc')
                            ->take(8)
                            ->get();
        
        return view('landing', compact('promotions'));
    }

    /**
     * Halaman Semua Promosi - Display a listing of public promotions.
     */
    public function index(Request $request)
    {
        $query = Promosi::where('status', 'Aktif'); // Hanya promosi yang aktif

        // Filter berdasarkan jenis ikan
        if ($request->filled('jenis_ikan')) {
            $query->where('jenis_ikan', $request->jenis_ikan);
        }

        // Search (untuk search bar)
        if ($request->filled('search') || $request->filled('q')) {
            $search = $request->filled('search') ? $request->search : $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul_promosi', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('jenis_ikan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        // Sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'harga_terendah':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'harga_tertinggi':
                    $query->orderBy('harga', 'desc');
                    break;
                case 'stok_terbanyak':
                    $query->orderBy('stok_tersedia', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Pagination: 12 promosi per halaman
        $promotions = $query->paginate(12)->withQueryString();

        // Ambil jenis ikan unik untuk filter
        $jenisIkan = Promosi::where('status', 'Aktif')
                           ->distinct()
                           ->pluck('jenis_ikan');

        return view('promosi', compact('promotions', 'jenisIkan'));
    }

    /**
     * Display the specified resource (Detail Promosi).
     */
    public function show($id)
    {
        $promosi = Promosi::where('status', 'Aktif')->findOrFail($id);
        
        // Increment views
        $promosi->increment('views');

        return view('promosi.show', compact('promosi'));
    }
    
    /**
     * Search promosi (alias untuk index dengan parameter search)
     */
    public function search(Request $request)
    {
        return $this->index($request);
    }
}