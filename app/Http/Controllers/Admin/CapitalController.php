<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JurnalDetail;
use App\Models\LabaRugi;
use Illuminate\Http\Request;
use PDF;


class CapitalController extends Controller
{
    public function index()
    {
        return view('perubahan-modal.index');
    }

    public function print(Request $request)
    {
        // month and year
        $dateYear=strtotime($request->month);
        $month=date("m",$dateYear);
        $year=date("Y",$dateYear);

        // laba rugi
        $labaRugi = LabaRugi::select('laba_rugi')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at', 'DESC')
            ->first();
        if($labaRugi == null) {
            return redirect()->route('perubahan-modal.index')->with('error', "Laporan Bulanan Laba dan Rugi belum dicetak! Silahkan cetak Laba dan Rugi terlebih dahulu");
        }

        // owner equity
        $modalAwal = JurnalDetail::select('credit')
            ->where('akun_id', 19)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at', 'DESC')
            ->first();

        // prive
        $privePlus = 0;
        $priveMinus = 0;
        $prive = JurnalDetail::select('debit', 'credit')
            ->where('akun_id', 20)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        
        for($i = 0; $i < count($prive); $i++)
        {
            $priveMinus += $prive[$i]->debit;
            $privePlus += $prive[$i]->credit;
        }

        $pdf = PDF::loadview('perubahan-modal.laporan',
            [
                'labaRugiTotal' => $labaRugi->laba_rugi,
                'equityTotal' => $modalAwal->credit,
                'priveTarikTotal' => $priveMinus,
                'priveSetorTotal' => $privePlus,
                'reportMonthYear' => 'Laporan Bulan '. $month . ' Tahun ' . $year,
            ]
        );

        return $pdf->stream('laporan-perubahan-modal-'.$request->month.'.pdf');
    }
}
