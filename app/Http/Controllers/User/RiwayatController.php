<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use App\Models\Promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Sementara menggunakan user_id = 1
        $userId = 1;

        // Filter
        $tipe = $request->input('tipe', 'semua');
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $search = $request->input('search');

        // Gabungkan semua aktivitas
        $riwayat = $this->getAllActivities($userId, $tipe, $tanggalMulai, $tanggalAkhir, $search);

        // Statistik
        $totalAktivitas = $riwayat->count();
        $totalPencatatan = Pencatatan::where('user_id', $userId)->count();
        $totalPanen = DataPanen::where('user_id', $userId)->count();
        $totalPromosi = Promosi::where('user_id', $userId)->count();

        return view('user.riwayat.index', compact(
            'riwayat',
            'totalAktivitas',
            'totalPencatatan',
            'totalPanen',
            'totalPromosi',
            'tipe',
            'tanggalMulai',
            'tanggalAkhir',
            'search'
        ));
    }

    /**
     * Get all activities (Pencatatan, Panen, Promosi)
     */
    private function getAllActivities($userId, $tipe, $tanggalMulai, $tanggalAkhir, $search)
    {
        $activities = collect();

        // Pencatatan
        if ($tipe === 'semua' || $tipe === 'pencatatan') {
            $pencatatan = Pencatatan::where('user_id', $userId)
                ->when($tanggalMulai && $tanggalAkhir, function($q) use ($tanggalMulai, $tanggalAkhir) {
                    return $q->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir]);
                })
                ->when($search, function($q) use ($search) {
                    return $q->where(function($query) use ($search) {
                        $query->where('jenis_kegiatan', 'like', "%{$search}%")
                              ->orWhere('keterangan', 'like', "%{$search}%")
                              ->orWhere('jenis_ikan', 'like', "%{$search}%");
                    });
                })
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->id,
                        'tipe' => 'pencatatan',
                        'tipe_label' => 'Pencatatan',
                        'icon' => 'fa-clipboard',
                        'color' => 'info',
                        'judul' => $item->jenis_kegiatan,
                        'deskripsi' => $item->keterangan ?? '-',
                        'jenis_ikan' => $item->jenis_ikan ?? '-',
                        'kolam' => $item->kolam ?? '-',
                        'detail' => [
                            'Jumlah Pakan' => $item->jumlah_pakan ? number_format($item->jumlah_pakan, 2) . ' Kg' : '-',
                            'Biaya' => $item->biaya ? 'Rp ' . number_format($item->biaya, 0, ',', '.') : '-',
                            'Kondisi Ikan' => $item->kondisi_ikan ?? '-',
                        ],
                        'tanggal' => $item->tanggal,
                        'created_at' => $item->created_at,
                        'route_show' => route('user.pencatatan.show', $item->id),
                        'route_edit' => route('user.pencatatan.edit', $item->id),
                    ];
                });

            $activities = $activities->merge($pencatatan);
        }

        // Data Panen
        if ($tipe === 'semua' || $tipe === 'panen') {
            $panen = DataPanen::where('user_id', $userId)
                ->when($tanggalMulai && $tanggalAkhir, function($q) use ($tanggalMulai, $tanggalAkhir) {
                    return $q->whereBetween('tanggal_panen', [$tanggalMulai, $tanggalAkhir]);
                })
                ->when($search, function($q) use ($search) {
                    return $q->where(function($query) use ($search) {
                        $query->where('jenis_ikan', 'like', "%{$search}%")
                              ->orWhere('kolam', 'like', "%{$search}%")
                              ->orWhere('pembeli', 'like', "%{$search}%");
                    });
                })
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->id,
                        'tipe' => 'panen',
                        'tipe_label' => 'Data Panen',
                        'icon' => 'fa-box',
                        'color' => 'success',
                        'judul' => 'Panen ' . $item->jenis_ikan,
                        'deskripsi' => 'Kolam: ' . $item->kolam,
                        'jenis_ikan' => $item->jenis_ikan,
                        'kolam' => $item->kolam,
                        'detail' => [
                            'Jumlah' => number_format($item->jumlah_ikan) . ' Ekor',
                            'Berat Total' => number_format($item->berat_total, 2) . ' Kg',
                            'Pendapatan' => 'Rp ' . number_format($item->total_pendapatan, 0, ',', '.'),
                            'Status' => $item->status,
                        ],
                        'tanggal' => $item->tanggal_panen,
                        'created_at' => $item->created_at,
                        'route_show' => route('user.panen.show', $item->id),
                        'route_edit' => route('user.panen.edit', $item->id),
                    ];
                });

            $activities = $activities->merge($panen);
        }

        // Promosi
        if ($tipe === 'semua' || $tipe === 'promosi') {
            $promosi = Promosi::where('user_id', $userId)
                ->when($tanggalMulai && $tanggalAkhir, function($q) use ($tanggalMulai, $tanggalAkhir) {
                    return $q->whereBetween('created_at', [$tanggalMulai, $tanggalAkhir]);
                })
                ->when($search, function($q) use ($search) {
                    return $q->where(function($query) use ($search) {
                        $query->where('judul_promosi', 'like', "%{$search}%")
                              ->orWhere('jenis_ikan', 'like', "%{$search}%")
                              ->orWhere('deskripsi', 'like', "%{$search}%");
                    });
                })
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->id,
                        'tipe' => 'promosi',
                        'tipe_label' => 'Promosi',
                        'icon' => 'fa-bullhorn',
                        'color' => 'warning',
                        'judul' => $item->judul_promosi,
                        'deskripsi' => $item->deskripsi,
                        'jenis_ikan' => $item->jenis_ikan,
                        'kolam' => '-',
                        'detail' => [
                            'Harga' => 'Rp ' . number_format($item->harga, 0, ',', '.') . '/' . $item->satuan,
                            'Stok' => number_format($item->stok_tersedia) . ' ' . $item->satuan,
                            'Status' => $item->status,
                            'Views' => number_format($item->views) . ' kali',
                        ],
                        'tanggal' => $item->created_at,
                        'created_at' => $item->created_at,
                        'route_show' => route('user.promosi.show', $item->id),
                        'route_edit' => route('user.promosi.edit', $item->id),
                    ];
                });

            $activities = $activities->merge($promosi);
        }

        // Sort by created_at descending
        return $activities->sortByDesc('created_at')->values();
    }

    /**
     * Export riwayat
     */
    public function export(Request $request)
    {
        // TODO: Implementasi export
        return redirect()->back()->with('info', 'Fitur export akan segera tersedia');
    }
}