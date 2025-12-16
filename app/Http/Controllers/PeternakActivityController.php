<?php

namespace App\Http\Controllers;

use App\Models\PeternakActivity;
use App\Models\Resident;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeternakActivityController extends Controller
{
    /**
     * Tampilkan semua aktivitas peternak
     */
    public function index(Request $request)
    {
        // Query activities dengan relasi peternak
        $query = PeternakActivity::with('peternak');

        // Filter berdasarkan peternak (jika ada)
        if ($request->filled('peternak_id')) {
            $query->where('peternak_id', $request->peternak_id);
        }

        // Filter berdasarkan jenis aktivitas (jika ada)
        if ($request->filled('activity_type')) {
            $query->where('activity_type', $request->activity_type);
        }

        // Filter berdasarkan periode (jika ada)
        if ($request->filled('periode')) {
            switch ($request->periode) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [
                        now()->startOfWeek(),
                        now()->endOfWeek()
                    ]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
            }
        }

        // Urutkan dari yang terbaru
        $activities = $query->orderBy('created_at', 'desc')->paginate(20);

        // Ambil semua peternak untuk filter dropdown
        $peternaks = Resident::with('user')
            ->where('status', 'aktif')
            ->orderBy('name')
            ->get();

        // Statistik
        $stats = [
            'total_today' => PeternakActivity::whereDate('created_at', today())->count(),
            'total_week' => PeternakActivity::thisWeek()->count(),
            'total_month' => PeternakActivity::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'total_all' => PeternakActivity::count(),
        ];

        // Aktivitas per jenis (untuk chart)
        $activityByType = PeternakActivity::selectRaw('activity_type, COUNT(*) as total')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('activity_type')
            ->get();

        return view('admin.activities.index', compact(
            'activities', 
            'peternaks', 
            'stats',
            'activityByType'
        ));
    }

    /**
     * Menyimpan aktivitas peternak
     * Method ini dipanggil dari controller lain (Pencatatan, Panen, dll)
     */
    public function store(Request $request)
    {
        $request->validate([
            'peternak_id' => 'required|exists:residents,id',
            'activity_type' => 'required|string',
            'description' => 'required|string',
            'related_module' => 'nullable|string',
            'related_id' => 'nullable|integer',
        ]);

        PeternakActivity::create([
            'peternak_id'   => $request->peternak_id,
            'activity_type' => $request->activity_type,
            'description'   => $request->description,
            'related_module'=> $request->related_module,
            'related_id'    => $request->related_id,
        ]);

        return response()->json(['message' => 'Activity saved'], 201);
    }

    /**
     * Menghapus aktivitas tertentu
     */
    public function destroy($id)
    {
        $activity = PeternakActivity::findOrFail($id);
        $activity->delete();

        return redirect()->back()
            ->with('success', 'Aktivitas berhasil dihapus');
    }

    /**
     * Hapus semua aktivitas lama (lebih dari 30 hari)
     */
    public function clearOldActivities()
    {
        $deleted = PeternakActivity::where('created_at', '<', now()->subDays(30))->delete();

        return redirect()->back()
            ->with('success', "Berhasil menghapus {$deleted} aktivitas lama");
    }

    /**
     * Export aktivitas ke CSV (opsional)
     */
    public function export(Request $request)
    {
        $activities = PeternakActivity::with('peternak')
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'aktivitas-peternak-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($activities) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, ['No', 'Peternak', 'Jenis Aktivitas', 'Deskripsi', 'Waktu']);

            // Data
            foreach ($activities as $index => $activity) {
                fputcsv($file, [
                    $index + 1,
                    $activity->peternak->name ?? 'N/A',
                    $activity->activity_type,
                    $activity->description,
                    $activity->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}