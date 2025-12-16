<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use App\Models\Promosi;
use App\Models\PeternakActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ==================== STATISTIK OVERVIEW ====================
        $totalPeternak = Resident::where('status', 'aktif')->count();
        
        $totalPencatatanBulanIni = Pencatatan::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();
        
        $totalPanenBulanIni = DataPanen::whereMonth('tanggal_panen', now()->month)
            ->whereYear('tanggal_panen', now()->year)
            ->count();
        
        $totalPromosiAktif = Promosi::where('status', 'Aktif')->count();

        // ==================== KEUANGAN ====================
        $pendapatanBulanIni = DataPanen::whereMonth('tanggal_panen', now()->month)
            ->whereYear('tanggal_panen', now()->year)
            ->sum('total_pendapatan') ?? 0;
        
        $pengeluaranBulanIni = Pencatatan::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('biaya') ?? 0;
        
        $labaBulanIni = $pendapatanBulanIni - $pengeluaranBulanIni;

        // Keuangan Tahun Ini
        $pendapatanTahunIni = DataPanen::whereYear('tanggal_panen', now()->year)
            ->sum('total_pendapatan') ?? 0;
        
        $pengeluaranTahunIni = Pencatatan::whereYear('tanggal', now()->year)
            ->sum('biaya') ?? 0;

        // ==================== PETERNAK TERAKTIF ====================
        $peternakTeraktif = Resident::withCount([
            'pencatatan as aktivitas_count' => function ($query) {
                $query->whereMonth('tanggal', now()->month)
                      ->whereYear('tanggal', now()->year);
            }
        ])
        ->with('user')
        ->where('status', 'aktif')
        ->orderBy('aktivitas_count', 'desc')
        ->limit(5)
        ->get();

        // ==================== PROMOSI TERBARU ====================
        $promosiTerbaru = Promosi::with('resident')
            ->where('status', 'Aktif')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // ==================== AKTIVITAS TERBARU ====================
        $aktivitasTerbaru = PeternakActivity::with('peternak')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // ==================== GRAFIK KEUANGAN (6 Bulan) ====================
        $chartKeuangan = $this->getChartKeuangan();

        // ==================== PANEN PER JENIS IKAN ====================
        $panenPerJenis = DataPanen::select('jenis_ikan', DB::raw('SUM(berat_total) as total_berat'))
            ->whereYear('tanggal_panen', now()->year)
            ->groupBy('jenis_ikan')
            ->orderBy('total_berat', 'desc')
            ->limit(5)
            ->get();

        // ==================== STATISTIK AKTIVITAS ====================
        $totalAktivitasHariIni = PeternakActivity::whereDate('created_at', today())->count();
        $totalAktivitasMingguIni = PeternakActivity::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        // ==================== TOP PETERNAK BY PENDAPATAN ====================
        $topPeternakByPendapatan = DataPanen::select('resident_id', DB::raw('SUM(total_pendapatan) as total'))
            ->with('resident')
            ->whereMonth('tanggal_panen', now()->month)
            ->whereYear('tanggal_panen', now()->year)
            ->groupBy('resident_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // ==================== PETERNAK BARU (30 Hari Terakhir) ====================
        $peternakBaru = Resident::where('created_at', '>=', now()->subDays(30))
            ->count();

        return view('admin.dashboardadmin', compact(
            'totalPeternak',
            'totalPencatatanBulanIni',
            'totalPanenBulanIni',
            'totalPromosiAktif',
            'pendapatanBulanIni',
            'pengeluaranBulanIni',
            'labaBulanIni',
            'pendapatanTahunIni',
            'pengeluaranTahunIni',
            'peternakTeraktif',
            'promosiTerbaru',
            'aktivitasTerbaru',
            'chartKeuangan',
            'panenPerJenis',
            'totalAktivitasHariIni',
            'totalAktivitasMingguIni',
            'topPeternakByPendapatan',
            'peternakBaru'
        ));
    }

    /**
     * Generate data untuk chart keuangan 6 bulan terakhir
     */
    private function getChartKeuangan()
    {
        $months = [];
        $pendapatan = [];
        $pengeluaran = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = $date->format('M Y');

            $pendapatan[] = DataPanen::whereMonth('tanggal_panen', $date->month)
                ->whereYear('tanggal_panen', $date->year)
                ->sum('total_pendapatan') ?? 0;

            $pengeluaran[] = Pencatatan::whereMonth('tanggal', $date->month)
                ->whereYear('tanggal', $date->year)
                ->sum('biaya') ?? 0;
        }

        return [
            'months' => $months,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
        ];
    }
}