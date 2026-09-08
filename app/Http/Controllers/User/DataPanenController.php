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

        $userId = auth()->id();
        $query->where('user_id', $userId);

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
        $totalPanen = DataPanen::where('user_id', $userId)->count();
        $totalBerat = DataPanen::where('user_id', $userId)->sum('berat_total');
        $totalPendapatan = DataPanen::where('user_id', $userId)->sum('total_pendapatan');

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

        $validated['user_id'] = auth()->id();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto'] = $file->storeAs('panen', $filename, 'public');
        }

        $panenItem = DataPanen::create($validated);

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Panen',
                'description'   => 'Menambahkan data panen ' . $panenItem->jenis_ikan . ' (' . $panenItem->berat_total . ' kg)',
                'related_module'=> 'panen',
                'related_id'    => $panenItem->id,
            ]);
        }

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPanen $panen)
    {
        if ($panen->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        return view('user.panen.show', compact('panen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPanen $panen)
    {
        if ($panen->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        return view('user.panen.edit', compact('panen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPanen $panen)
    {
        if ($panen->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

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

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Update',
                'description'   => 'Mengubah data panen ' . $panen->jenis_ikan,
                'related_module'=> 'panen',
                'related_id'    => $panen->id,
            ]);
        }

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPanen $panen)
    {
        if ($panen->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $jenisIkan = $panen->jenis_ikan;
        // Hapus foto jika ada
        if ($panen->foto) {
            Storage::disk('public')->delete($panen->foto);
        }

        $panen->delete();

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Delete',
                'description'   => 'Menghapus data panen ' . $jenisIkan,
                'related_module'=> 'panen',
                'related_id'    => null,
            ]);
        }

        return redirect()->route('user.panen.index')
            ->with('success', 'Data panen berhasil dihapus');
    }
}