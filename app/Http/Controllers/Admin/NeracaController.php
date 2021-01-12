<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JurnalDetail;
use App\Models\PerubahanModal;
use Illuminate\Http\Request;
use PDF;

class NeracaController extends Controller
{
    public function index()
    {
        return view('neraca.index');
    }

    public function print(Request $request)
    {
        // month and year
        $dateYear=strtotime($request->month);
        $month=date("m",$dateYear);
        $year=date("Y",$dateYear);

        // aset lancar
        $cashTotal = 0;
        $ar = 0;
        $ap = 0;
        $bungaTotal = 0;
        $totalPersediaan=0;
        $totalAktivaLancar = 0;
        $pasivaJP = 0;
        $pasivaJPan = 0;
        $totalAktiva = 0;
        $totalAktivaTidakLancar = 0;
        $totalBangunan = 0;
        $totalWesel=0;
        $capitalTotal=0;
        //activa lancar
        //kas
        $cash = JurnalDetail::select('debit')
            ->where('akun_id', 21)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $cashTotal = $cash;
        
        //piutang
        $accountReceivable = JurnalDetail::select('debit')
            ->where('akun_id', 22)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $ar = $accountReceivable;

        // aktiva tidak lancar

        //persediaan
        $persedian = JurnalDetail::select('debit')
            ->where('akun_id', 27)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $totalPersediaan = $persedian;
        
        //kendaraan
        $kendaraan = JurnalDetail::select('debit')
            ->where('akun_id', 28)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $totalKendaraan = $kendaraan;

        $bangunan = JurnalDetail::select('debit')
            ->where('akun_id', 25)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $totalBangunan = $bangunan;

        // pasiva

        //jangka pendek

        //hutang
        $accountPayable = JurnalDetail::select('credit')
            ->where('akun_id', 23)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('credit');
        $ap = $accountPayable;

        //wesel bayar
        $wesel = JurnalDetail::select('credit')
            ->where('akun_id', 26)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('credit');
        $totalWesel = $wesel;

        $capitals = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 19)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($capitals); $i++) {
            $capitalTotal += ($capitals[$i]->credit - $capitals[$i]->debit);
        }

        $totalAktivaLancar = $cash + $ar + $persedian;
        $totalAktivaTidakLancar = $persedian + $bangunan;
        $pasivaJP = $ap;
        $pasivaJPan = $wesel;
        $totalAktiva = $totalAktivaLancar + $totalAktivaTidakLancar;
        $totalKewajibanDanModal = $pasivaJP + $pasivaJPan + $capitalTotal;

        $pdf = PDF::loadview('neraca.laporan', 
            [
                'reportMonthYear' => 'Laporan Bulan '. $month . ' Tahun ' . $year,
                'cashTotal' => $cashTotal,
                'ar' => $ar,
                'totalPersediaan' => $totalPersediaan,
                'totalKendaraan' => $totalKendaraan,
                'totalBangunan' => $totalBangunan,
                'ap' => $ap,
                'totalWesel' => $totalWesel,
                'totalAktivaLancar' => $totalAktivaLancar,
                'totalAktivaTidakLancar' => $totalAktivaTidakLancar,
                'totalAktiva' => $totalAktiva,
                'totalKewajibanDanModal' => $totalKewajibanDanModal,
                'pasivaJP' => $pasivaJP,
                'pasivaJPan' => $pasivaJPan,
                'capitalTotal' => $capitalTotal,
                
            ]
        );
        return $pdf->stream('laporan-neraca-'.$request->month.'.pdf');
    }
}