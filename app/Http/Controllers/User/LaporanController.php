<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use App\Models\Promosi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Sementara menggunakan user_id = 1
        $userId = 1;

        // Periode filter (default bulan ini)
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        // Laporan Pencatatan
        $laporanPencatatan = $this->getLaporanPencatatan($userId, $bulan, $tahun);
        
        // Laporan Panen
        $laporanPanen = $this->getLaporanPanen($userId, $bulan, $tahun);
        
        // Laporan Promosi
        $laporanPromosi = $this->getLaporanPromosi($userId, $bulan, $tahun);
        
        // Laporan Keuangan
        $laporanKeuangan = $this->getLaporanKeuangan($userId, $bulan, $tahun);

        // Data untuk chart
        $chartData = $this->getChartData($userId, $tahun);

        return view('user.laporan.index', compact(
            'laporanPencatatan',
            'laporanPanen',
            'laporanPromosi',
            'laporanKeuangan',
            'chartData',
            'bulan',
            'tahun'
        ));
    }

    /**
     * Get laporan pencatatan
     */
    private function getLaporanPencatatan($userId, $bulan, $tahun)
    {
        $totalPencatatan = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->count();

        $totalBiaya = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('biaya') ?? 0;

        $totalPakan = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('jumlah_pakan') ?? 0;

        $byJenisKegiatan = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->select('jenis_kegiatan', DB::raw('count(*) as total'))
            ->groupBy('jenis_kegiatan')
            ->get();

        return [
            'total_pencatatan' => $totalPencatatan,
            'total_biaya' => $totalBiaya,
            'total_pakan' => $totalPakan,
            'by_jenis_kegiatan' => $byJenisKegiatan,
        ];
    }

    /**
     * Get laporan panen
     */
    private function getLaporanPanen($userId, $bulan, $tahun)
    {
        $totalPanen = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulan)
            ->whereYear('tanggal_panen', $tahun)
            ->count();

        $totalBerat = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulan)
            ->whereYear('tanggal_panen', $tahun)
            ->sum('berat_total') ?? 0;

        $totalPendapatan = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulan)
            ->whereYear('tanggal_panen', $tahun)
            ->sum('total_pendapatan') ?? 0;

        $byJenisIkan = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulan)
            ->whereYear('tanggal_panen', $tahun)
            ->select('jenis_ikan', DB::raw('SUM(berat_total) as total_berat'), DB::raw('SUM(total_pendapatan) as total_pendapatan'))
            ->groupBy('jenis_ikan')
            ->get();

        return [
            'total_panen' => $totalPanen,
            'total_berat' => $totalBerat,
            'total_pendapatan' => $totalPendapatan,
            'by_jenis_ikan' => $byJenisIkan,
        ];
    }

    /**
     * Get laporan promosi
     */
    private function getLaporanPromosi($userId, $bulan, $tahun)
    {
        $totalPromosi = Promosi::where('user_id', $userId)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->count();

        $promosiAktif = Promosi::where('user_id', $userId)
            ->where('status', 'Aktif')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->count();

        $totalViews = Promosi::where('user_id', $userId)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->sum('views') ?? 0;

        return [
            'total_promosi' => $totalPromosi,
            'promosi_aktif' => $promosiAktif,
            'total_views' => $totalViews,
        ];
    }

    /**
     * Get laporan keuangan
     */
    private function getLaporanKeuangan($userId, $bulan, $tahun)
    {
        // Total Pengeluaran (dari pencatatan)
        $totalPengeluaran = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('biaya') ?? 0;

        // Total Pemasukan (dari panen)
        $totalPemasukan = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulan)
            ->whereYear('tanggal_panen', $tahun)
            ->sum('total_pendapatan') ?? 0;

        // Laba/Rugi
        $labaRugi = $totalPemasukan - $totalPengeluaran;

        return [
            'total_pengeluaran' => $totalPengeluaran,
            'total_pemasukan' => $totalPemasukan,
            'laba_rugi' => $labaRugi,
        ];
    }

    /**
     * Get data untuk chart
     */
    private function getChartData($userId, $tahun)
    {
        $months = [];
        $pendapatan = [];
        $pengeluaran = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::createFromDate($tahun, $i, 1)->format('M');
            
            $pendapatan[] = DataPanen::where('user_id', $userId)
                ->whereMonth('tanggal_panen', $i)
                ->whereYear('tanggal_panen', $tahun)
                ->sum('total_pendapatan') ?? 0;

            $pengeluaran[] = Pencatatan::where('user_id', $userId)
                ->whereMonth('tanggal', $i)
                ->whereYear('tanggal', $tahun)
                ->sum('biaya') ?? 0;
        }

        return [
            'months' => $months,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
        ];
    }

    /**
     * Export laporan ke PDF
     */
    public function exportPdf(Request $request)
    {
        // TODO: Implementasi export PDF
        return redirect()->back()->with('info', 'Fitur export PDF akan segera tersedia');
    }

    /**
     * Print laporan
     */
    public function print(Request $request)
    {
        $userId = 1;
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $laporanPencatatan = $this->getLaporanPencatatan($userId, $bulan, $tahun);
        $laporanPanen = $this->getLaporanPanen($userId, $bulan, $tahun);
        $laporanPromosi = $this->getLaporanPromosi($userId, $bulan, $tahun);
        $laporanKeuangan = $this->getLaporanKeuangan($userId, $bulan, $tahun);

        return view('user.laporan.print', compact(
            'laporanPencatatan',
            'laporanPanen',
            'laporanPromosi',
            'laporanKeuangan',
            'bulan',
            'tahun'
        ));
    }
}