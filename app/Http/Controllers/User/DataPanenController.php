<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataPanen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DataPanen::query();

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

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_panen', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $dataPanen = $query->orderBy('tanggal_panen', 'desc')->paginate(10);

        // Statistik
        $totalPanen = DataPanen::where('user_id', 1)->count();
        $totalBerat = DataPanen::where('user_id', 1)->sum('berat_total');
        $totalPendapatan = DataPanen::where('user_id', 1)->sum('total_pendapatan');

        return view('user.panen.index', compact('dataPanen', 'totalPanen', 'totalBerat', 'totalPendapatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.panen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_panen' => 'required|date',
            'jenis_ikan' => 'required|string|max:255',
            'kolam' => 'required|string|max:255',
            'jumlah_ikan' => 'required|integer|min:1',
            'berat_total' => 'required|numeric|min:0',
            'harga_per_kg' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Sudah Terjual,Belum Terjual,Sebagian Terjual',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Hitung berat rata-rata per ekor
        $validated['berat_rata_rata'] = $validated['berat_total'] / $validated['jumlah_ikan'];

        // Hitung total pendapatan
        $validated['total_pendapatan'] = $validated['berat_total'] * $validated['harga_per_kg'];

        // Sementara menggunakan user_id = 1
        $validated['user_id'] = 1;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto'] = $file->storeAs('panen', $filename, 'public');
        }

        DataPanen::create($validated);

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPanen $panen)
    {
        return view('user.panen.show', compact('panen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPanen $panen)
    {
        return view('user.panen.edit', compact('panen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPanen $panen)
    {
        $validated = $request->validate([
            'tanggal_panen' => 'required|date',
            'jenis_ikan' => 'required|string|max:255',
            'kolam' => 'required|string|max:255',
            'jumlah_ikan' => 'required|integer|min:1',
            'berat_total' => 'required|numeric|min:0',
            'harga_per_kg' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Sudah Terjual,Belum Terjual,Sebagian Terjual',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Hitung berat rata-rata per ekor
        $validated['berat_rata_rata'] = $validated['berat_total'] / $validated['jumlah_ikan'];

        // Hitung total pendapatan
        $validated['total_pendapatan'] = $validated['berat_total'] * $validated['harga_per_kg'];

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($panen->foto) {
                Storage::disk('public')->delete($panen->foto);
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto'] = $file->storeAs('panen', $filename, 'public');
        }

        $panen->update($validated);

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPanen $panen)
    {
        // Hapus foto jika ada
        if ($panen->foto) {
            Storage::disk('public')->delete($panen->foto);
        }

        $panen->delete();

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil dihapus');
    }
}