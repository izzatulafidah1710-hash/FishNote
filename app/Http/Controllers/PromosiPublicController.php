<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use Illuminate\Http\Request;

class PromosiPublicController extends Controller
{
    /**
     * Display a listing of public promotions.
     */
    public function index(Request $request)
    {
        $query = Promosi::active(); // Hanya promosi yang aktif

        // Filter berdasarkan jenis ikan
        if ($request->filled('jenis_ikan')) {
            $query->where('jenis_ikan', $request->jenis_ikan);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('judul_promosi', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        $promosi = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('public.promosi.index', compact('promosi'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $promosi = Promosi::where('status', 'Aktif')->findOrFail($id);
        
        // Increment views
        $promosi->incrementViews();

        return view('public.promosi.show', compact('promosi'));
    }
}