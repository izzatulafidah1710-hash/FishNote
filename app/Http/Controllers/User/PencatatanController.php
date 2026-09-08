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
        $query->where('user_id', auth()->id());

        // Filter jenis kegiatan
        if ($request->filled('jenis_kegiatan')) {
            $query->where('jenis_kegiatan', $request->jenis_kegiatan);
        }

        // Filter tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $pencatatan = $query->orderBy('tanggal', 'desc')->paginate(10);

        $totalPencatatan = Pencatatan::where('user_id', auth()->id())->count();
        $totalBiaya = Pencatatan::where('user_id', auth()->id())->sum('biaya');
        $pencatatanBulanIni = Pencatatan::where('user_id', auth()->id())
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        return view('user.pencatatan.index', compact('pencatatan', 'totalPencatatan', 'totalBiaya', 'pencatatanBulanIni'));
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

        $validated['user_id'] = auth()->id();
        $validated['resident_id'] = auth()->user()->resident?->id;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pencatatan', 'public');
        }

        $item = Pencatatan::create($validated);

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Pencatatan',
                'description'   => 'Menambahkan pencatatan: ' . $item->jenis_kegiatan,
                'related_module'=> 'pencatatan',
                'related_id'    => $item->id,
            ]);
        }

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pencatatan $pencatatan)
    {
        if ($pencatatan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        return view('user.pencatatan.show', compact('pencatatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pencatatan $pencatatan)
    {
        if ($pencatatan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
        return view('user.pencatatan.edit', compact('pencatatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pencatatan $pencatatan)
    {
        if ($pencatatan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

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

        if (!empty(auth()->user()->resident?->id)) {
            $validated['resident_id'] = auth()->user()->resident->id;
        }

        if ($request->hasFile('foto')) {
            if ($pencatatan->foto) {
                Storage::disk('public')->delete($pencatatan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pencatatan', 'public');
        }

        $pencatatan->update($validated);

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Update',
                'description'   => 'Mengubah pencatatan: ' . $pencatatan->jenis_kegiatan,
                'related_module'=> 'pencatatan',
                'related_id'    => $pencatatan->id,
            ]);
        }

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pencatatan $pencatatan)
    {
        if ($pencatatan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $kegiatan = $pencatatan->jenis_kegiatan;
        if ($pencatatan->foto) {
            Storage::disk('public')->delete($pencatatan->foto);
        }

        $pencatatan->delete();

        if (auth()->user()->resident) {
            \App\Models\PeternakActivity::create([
                'peternak_id'   => auth()->user()->resident->id,
                'activity_type' => 'Delete',
                'description'   => 'Menghapus pencatatan: ' . $kegiatan,
                'related_module'=> 'pencatatan',
                'related_id'    => null,
            ]);
        }

        return redirect()->route('user.pencatatan.index')
            ->with('success', 'Data pencatatan berhasil dihapus');
    }
}