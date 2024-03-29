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
        $totalKendaraan=0;
        //activa lancar
        //kas
        $cash = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 21)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($cash); $i++) {
            $cashTotal += ($cash[$i]->credit - $cash[$i]->debit);
        }
        
        
        //piutang
        $accountReceivable = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 22)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($accountReceivable); $i++) {
            $ar += ($accountReceivable[$i]->credit - $accountReceivable[$i]->debit);
        }
        // aktiva tidak lancar

        //persediaan
        $persedian = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 26)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();        
        for($i = 0; $i < count($persedian); $i++) {
            $totalPersediaan += ($persedian[$i]->credit - $persedian[$i]->debit);
        }

        //kendaraan
        $kendaraan = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 27)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($kendaraan); $i++) {
            $totalKendaraan += ($kendaraan[$i]->credit - $kendaraan[$i]->debit);
        }

        $bangunan = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 24)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($bangunan); $i++) {
            $totalBangunan += ($bangunan[$i]->credit - $bangunan[$i]->debit);
        }
        // pasiva

        //jangka pendek

        //hutang
        $accountPayable = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 23)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($accountPayable); $i++) {
            $ap += ($accountPayable[$i]->credit - $accountPayable[$i]->debit);
        }
        //wesel bayar
        $wesel = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 25)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($wesel); $i++) {
            $totalWesel += ($wesel[$i]->credit - $wesel[$i]->debit);
        }

        $capitals = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 19)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($capitals); $i++) {
            $capitalTotal += ($capitals[$i]->credit - $capitals[$i]->debit);
        }
        $total_laba = 0;
        
        $labaditahan = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 29)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($labaditahan); $i++) {
            $total_laba += ($labaditahan[$i]->credit - $labaditahan[$i]->debit);
        }

        $total_laba_berjalan = 0;
        
        $laba_berjalan = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 29)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($laba_berjalan); $i++) {
            $total_laba_berjalan += ($laba_berjalan[$i]->credit - $laba_berjalan[$i]->debit);
        }

        $total_perlengkapan = 0;

        $perlengkapan = JurnalDetail::select('credit', 'debit')
            ->where('akun_id', 4)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        for($i = 0; $i < count($perlengkapan); $i++) {
            $total_perlengkapan += ($perlengkapan[$i]->credit - $perlengkapan[$i]->debit);
        }

        $totalAktivaLancar = $cashTotal + $ar + $totalPersediaan;
        $totalAktivaTidakLancar = $totalKendaraan + $totalBangunan + $total_perlengkapan;
        $pasivaJP = $ap;
        $pasivaJPan = $totalWesel;
        $totalAktiva = $totalAktivaLancar + $totalAktivaTidakLancar;
        $total_modal = $total_laba + $capitalTotal + $total_laba_berjalan;
        $totalKewajibanDanModal = $pasivaJP + $pasivaJPan + $total_modal;

        $pdf = PDF::loadview('neraca.laporan', 
            [
                'reportMonthYear' => 'Laporan Bulan '. $month . ' Tahun ' . $year,
                'cashTotal' => $cashTotal * -1,
                'ar' => $ar * -1,
                'totalPersediaan' => $totalPersediaan,
                'totalKendaraan' => $totalKendaraan * -1,
                'totalBangunan' => $totalBangunan,
                'ap' => $ap,
                'totalWesel' => $totalWesel,
                'totalAktivaLancar' => $totalAktivaLancar * -1,
                'totalAktivaTidakLancar' => $totalAktivaTidakLancar * -1,
                'totalAktiva' => $totalAktiva * -1,
                'totalKewajibanDanModal' => $totalKewajibanDanModal,
                'pasivaJP' => $pasivaJP,
                'pasivaJPan' => $pasivaJPan,
                'capitalTotal' => $capitalTotal,
                'total_laba' => $total_laba,
                'total_modal' => $total_modal,
                'total_laba_berjalan' => $total_laba_berjalan,
                'total_perlengkapan' => $total_perlengkapan * -1,
                
            ]
        );
        return $pdf->stream('laporan-neraca-'.$request->month.'.pdf');
    }
}