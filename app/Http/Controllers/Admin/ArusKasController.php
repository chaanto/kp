<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JurnalDetail;
use PDF;

class ArusKasController extends Controller
{
    public function index()
    {
        return view('arus-kas.index');
    }

    public function print(Request $request)
    {
        // month and year
        $startRawDate=strtotime($request->start_month);
        $startDate=date($request->start_month);
        $startMonth=date("m",$startRawDate);
        $startYear=date("Y",$startRawDate);

        $endRawDate=strtotime($request->end_month);
        $endDate=date($request->end_month);
        $endMonth=date("m",$endRawDate);
        $endYear=date("Y",$endRawDate);

        $totalPenjualan = 0;
        $ar =0;
        $TotalPendapatan = 0;
        $TotalInvestasi =0;
        $ap = 0;
        $maintain =0;
        $listrikAir = 0;
        $administrasi =0;
        $angsuran =0;
        $bunga =0; 
        $pinjamanKeluar=0;
        $pinjamanMasuk=0; 
        // Arus Kas Masuk
        $penjualan = JurnalDetail::select('credit')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('credit');
        $totalPenjualan = $penjualan;

        $accountReceivable = JurnalDetail::select('credit')
            ->where('akun_id', 22)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('credit');
        $ar = $accountReceivable;

        $pendapatan = JurnalDetail::select('credit')
            ->where('akun_id', 29)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('credit');
        $TotalPendapatan = $pendapatan;

        $hasilinvestasi = JurnalDetail::select('credit')
            ->where('akun_id', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('credit');
        $TotalInvestasi = $hasilinvestasi;

        // arus kas keluar
        $accountPayable = JurnalDetail::select('debit')
            ->where('akun_id', 23)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $ap = $accountPayable;

        $totalMaintain = JurnalDetail::select('debit')
            ->where('akun_id', 9)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $maintain = $totalMaintain;

        $totalListrikAir= JurnalDetail::select('debit')
            ->where('akun_id', 12)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $listrikAir = $totalListrikAir;

        $totalAdministrasi = JurnalDetail::select('debit')
            ->where('akun_id', 13)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $administrasi = $totalAdministrasi;

        $totalAngsuran = JurnalDetail::select('debit')
            ->where('akun_id', 14)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $angsuran = $totalAngsuran;

        $totalBunga = JurnalDetail::select('debit')
            ->where('akun_id', 15)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $bunga = $totalBunga;

        $totalPinjaman = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 18)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        for($i = 0; $i < count($totalPinjaman); $i++) {
            $pinjamanKeluar += $prive[$i]->debit;
            $pinjamanMasuk += $prive[$i]->credit;
        }
        $asset = 0;
        $totalAsset = JurnalDetail::select('debit')
            ->where('akun_id', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('debit');
        $asset = $totalAsset;

        $privePlus = 0;
        $priveMinus = 0;
        $prive = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 20)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        
        for($i = 0; $i < count($prive); $i++)
        {
            $priveMinus += $prive[$i]->debit;
            $privePlus += $prive[$i]->credit;
        }
        
        $pendapatanLain = $pinjamanMasuk + $pendapatan + $privePlus;
        $totalBebanOperasional = $asset + $maintain + $listrikAir + $administrasi + $angsuran + $bunga ;
        $totalArusKasMasuk = $totalPenjualan + $ar + $pendapatanLain +  $TotalInvestasi;
        $totalArusKasKeluar = $ap + $totalBebanOperasional + $priveMinus + $pinjamanKeluar;
        
        $totalKas = $totalArusKasMasuk - $totalArusKasKeluar;
        $pdf = PDF::loadview('arus-kas.laporan', [
            // arus masuk
            'totalPenjualan' => $totalPenjualan,
            'pendapatanLain' => $pendapatanLain,
            'ar' => $ar,
            //arus keluar
            'totalBebanOperasional' => $totalBebanOperasional,
            'ap' => $ap,
            'priveMinus' => $priveMinus,
            // investing
            'investasi' => $TotalInvestasi,
            //etc
            'totalArusKasKeluar' => $totalArusKasKeluar,
            'totalArusKasMasuk' => $totalArusKasMasuk,
            'totalKas' => $totalKas,
            'reportMonthYear' => 'Laporan Mulai Dari '. $startDate . ' Hingga ' . $endDate,
        ]);
        return $pdf->stream('laporan-arus-kas-'.$startDate.'.pdf');
    }
}