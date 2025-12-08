<?php

namespace App\Http\Controllers;

use App\Models\Promosi; // SESUAIKAN dengan nama model Anda
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua promosi yang aktif, urutkan terbaru
        $promotions = Promosi::where('status', 'Aktif')
                            ->orderBy('created_at', 'desc')
                            ->take(8)  
                            ->get();
        
        return view('landing', compact('promotions'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        
        // Cari berdasarkan jenis ikan, lokasi, atau nama peternak
        $promotions = Promosi::where('jenis_ikan', 'LIKE', "%{$query}%")
                            ->orWhere('lokasi', 'LIKE', "%{$query}%")
                            ->where('status', 'aktif')
                            ->get();
        
        return view('landing', compact('promotions'));
    }
}