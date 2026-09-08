<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Promosi;
use Illuminate\Http\Request;

class DaftarPromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Promosi::query();

        // Filter milik user yang sedang login
        $query->where('user_id', auth()->id());

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis ikan
        if ($request->filled('jenis_ikan')) {
            $query->where('jenis_ikan', $request->jenis_ikan);
        }

        // Urutkan berdasarkan yang terbaru
        $promosi = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('user.daftar-promosi.index', compact('promosi'));
    }

    /**
     * Toggle status promosi (Aktif/Tidak Aktif)
     */
    public function toggleStatus($id)
    {
        $promosi = Promosi::findOrFail($id);
        
        if ($promosi->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah status promosi ini.');
        }

        // Toggle status
        if ($promosi->status === 'Aktif') {
            $promosi->status = 'Tidak Aktif';
        } else {
            $promosi->status = 'Aktif';
        }
        
        $promosi->save();

        return redirect()->back()->with('success', 'Status promosi berhasil diubah');
    }
}