<?php

namespace App\Http\Controllers\Admin;

use App\Models\JurnalDetail;
use App\Models\LabaRugi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class LabaRugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laba-rugi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        

        //receivable account
        $penjualan = 0;
        $pinjaman = 0;

        //Expense account
        $bahanBaku = 0;
        $transport = 0;
        $gajiKaryawan = 0;
        $maintain = 0;
        $marketing = 0;
        $listrikAir = 0;
        $sewa =0;
        $penyusutan_kendaraan =0;
        $administrasi=0;


        // month and year
        $dateYear=strtotime($request->month);
        $month=date("m",$dateYear);
        $year=date("Y",$dateYear);
        $startRawDate=strtotime($request->start_month);
        $startDate=date($request->start_month);

        
        $totalBahanBaku = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 2)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalBahanBaku); $i++) {
            $bahanBaku += ($totalBahanBaku[$i]->credit - $totalBahanBaku[$i]->debit);
        }

        $totalTransport = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 5)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalTransport); $i++) {
            $transport += ($totalTransport[$i]->credit - $totalTransport[$i]->debit);
        }

        $totalGajiKaryawan = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 8)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalGajiKaryawan); $i++) {
            $gajiKaryawan += ($totalGajiKaryawan[$i]->credit - $totalGajiKaryawan[$i]->debit);
        }

        $totalMaintain = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 9)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalMaintain); $i++) {
            $maintain += ($totalMaintain[$i]->credit - $totalMaintain[$i]->debit);
        }

        $totalIklan = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 33)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalIklan); $i++) {
            $marketing += ($totalIklan[$i]->credit - $totalIklan[$i]->debit);
        }

        $totalListrikAir= JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 12)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalListrikAir); $i++) {
            $listrikAir += ($totalListrikAir[$i]->credit - $totalListrikAir[$i]->debit);
        }

        $totalSewa = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 31)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalSewa); $i++) {
            $sewa += ($totalSewa[$i]->credit - $totalSewa[$i]->debit);
        }

        $adminis = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 13)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($adminis); $i++) {
            $administrasi += ($adminis[$i]->credit - $adminis[$i]->debit);
        }

        $penyusutan = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 16)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($penyusutan); $i++) {
            $penyusutan_kendaraan += ($penyusutan[$i]->credit - $penyusutan[$i]->debit);
        }

        $totalPenjualan = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 17)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalPenjualan); $i++) {
            $penjualan += ($totalPenjualan[$i]->credit - $totalPenjualan[$i]->debit);
        }

        $total_kas=0;

        $kas = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 21)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($kas); $i++) {
            $total_kas += ($kas[$i]->credit - $kas[$i]->debit);
        }
        $total_p_lain=0;

        $p_lain = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 28)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($p_lain); $i++) {
            $total_p_lain += ($p_lain[$i]->credit - $p_lain[$i]->debit);
        }

        $totalPinjaman = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 18)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($totalPinjaman); $i++) {
            $pinjaman += ($totalPinjaman[$i]->credit - $totalPinjaman[$i]->debit);
        }

        // count all laba dan rugi
        $totalPendapatan = $total_p_lain;
        $labaKotor = $bahanBaku + $transport;
        $totalLabaKotor = $totalPendapatan - $labaKotor;
        $totalBebanOperasional = $marketing + $maintain + $listrikAir + $sewa + $penyusutan_kendaraan + $gajiKaryawan;
        $totalLabaBersih = $totalLabaKotor - $totalBebanOperasional;
    
        $laba_rugi = LabaRugi::create([
            'laba_rugi' => $totalLabaBersih,
        ]);
        $laba_rugi->created_at = $dateYear;
        $laba_rugi->save();

        $pdf = PDF::loadview('laba-rugi.laporan',
            [
                'penjualan' => abs($penjualan),
                'pinjaman' => abs($pinjaman),
                'bahanBaku' => abs($bahanBaku),
                'transport' => abs($transport),
                'gajiKaryawan' => abs($gajiKaryawan),
                'administrasi' => abs($administrasi),
                'marketing' => abs($marketing),
                'maintain' => abs($maintain),
                'listrikAir' => abs($listrikAir),
                'sewa' => abs($sewa),
                'penyusutan_kendaraan' => abs($penyusutan_kendaraan),
                'labaKotor' => abs($labaKotor),
                'totalLabaKotor' => abs($totalLabaKotor),
                'totalPendapatan' => abs($totalPendapatan),
                'totalBebanOperasional' => abs($totalBebanOperasional),
                'totalLabaBersih' => abs($totalLabaBersih),
                'total_p_lain' => abs($total_p_lain),
                'total_kas' => abs($total_kas),
                'reportMonthYear' => 'Laporan Bulan '. $month . ' Tahun ' . $year,
            ]
        );
        return $pdf->stream('laporan-laba-rugi-'.$request->month.'.pdf');
    }
}
