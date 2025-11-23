<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pencatatan::query();

        // Sementara memakai user_id = 1
        $query->where('user_id', 1);

        // Filter jenis kegiatan
        if ($request->filled('jenis_kegiatan')) {
            $query->where('jenis_kegiatan', $request->jenis_kegiatan);
        }

        // Filter tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $pencatatan = $query->orderBy('tanggal', 'desc')->paginate(10);

        return view('user.pencatatan.index', compact('pencatatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pencatatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis_kegiatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',

            // Tambahan
            'jenis_ikan' => 'nullable|string|max:255',
            'kolam' => 'nullable|string|max:255',

            'jumlah_pakan' => 'nullable|numeric|min:0',
            'berat_ikan' => 'nullable|numeric|min:0',
            'jumlah_ikan' => 'nullable|integer|min:0',
            'suhu_air' => 'nullable|numeric',
            'ph_air' => 'nullable|numeric|min:0|max:14',
            'oksigen' => 'nullable|numeric|min:0',
            'kondisi_ikan' => 'nullable|string',
            'biaya' => 'nullable|numeric|min:0',

            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['user_id'] = 1;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pencatatan', 'public');
        }

        Pencatatan::create($validated);

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pencatatan $pencatatan)
    {
        return view('user.pencatatan.show', compact('pencatatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pencatatan $pencatatan)
    {
        return view('user.pencatatan.edit', compact('pencatatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pencatatan $pencatatan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis_kegiatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',

            // Tambahan
            'jenis_ikan' => 'nullable|string|max:255',
            'kolam' => 'nullable|string|max:255',

            'jumlah_pakan' => 'nullable|numeric|min:0',
            'berat_ikan' => 'nullable|numeric|min:0',
            'jumlah_ikan' => 'nullable|integer|min:0',
            'suhu_air' => 'nullable|numeric',
            'ph_air' => 'nullable|numeric|min:0|max:14',
            'oksigen' => 'nullable|numeric|min:0',
            'kondisi_ikan' => 'nullable|string',
            'biaya' => 'nullable|numeric|min:0',

            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pencatatan->foto) {
                Storage::disk('public')->delete($pencatatan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pencatatan', 'public');
        }

        $pencatatan->update($validated);

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pencatatan $pencatatan)
    {
        if ($pencatatan->foto) {
            Storage::disk('public')->delete($pencatatan->foto);
        }

        $pencatatan->delete();

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil dihapus');
    }
}