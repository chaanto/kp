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
        $asset = 0;
        $bahanBaku = 0;
        $bahanPembantu = 0;
        $buruh = 0;
        $transport = 0;
        $produksi = 0;
        $gajiBoss = 0;
        $gajiKaryawan = 0;
        $maintain = 0;
        $marketing = 0;
        $alatTulis = 0;
        $listrikAir = 0;
        $administrasi =0;
        $angsuran  =0;
        $bunga =0;
        $pajak =0;


        // month and year
        $dateYear=strtotime($request->month);
        $month=date("m",$dateYear);
        $year=date("Y",$dateYear);

        // get total asset
        $totalAsset = JurnalDetail::select('debit')
            ->where('akun_id', 1)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $asset = $totalAsset;
        
        $totalBahanBaku = JurnalDetail::select('debit')
            ->where('akun_id', 2)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $bahanBaku = $totalBahanBaku;

        $totalBahanPembantu = JurnalDetail::select('debit')
            ->where('akun_id', 3)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $bahanPembantu = $totalBahanPembantu;

        $totalBuruh = JurnalDetail::select('debit')
            ->where('akun_id', 4)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $buruh = $totalBuruh;

        $totalTransport = JurnalDetail::select('debit')
            ->where('akun_id', 5)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $transport = $totalTransport;

        $totalProduksi = JurnalDetail::select('debit')
            ->where('akun_id', 6)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $produksi = $totalProduksi;

        $totalGajiBoss = JurnalDetail::select('debit')
            ->where('akun_id', 7)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $gajiBoss = $totalGajiBoss;

        $totalGajiKaryawan = JurnalDetail::select('debit')
            ->where('akun_id', 8)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $gajiKaryawan = $totalGajiKaryawan;

        $totalMaintain = JurnalDetail::select('debit')
            ->where('akun_id', 9)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $maintain = $totalMaintain;

        $totalMarketing = JurnalDetail::select('debit')
            ->where('akun_id', 10)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $marketing = $totalMarketing;

        $totalAlatTulis = JurnalDetail::select('debit')
            ->where('akun_id', 11)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $alatTulis = $totalAlatTulis;

        $totalListrikAir= JurnalDetail::select('debit')
            ->where('akun_id', 12)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $listrikAir = $totalListrikAir;

        $totalAdministrasi = JurnalDetail::select('debit')
            ->where('akun_id', 13)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $administrasi = $totalAdministrasi;

        $totalAngsuran = JurnalDetail::select('debit')
            ->where('akun_id', 14)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $angsuran = $totalAngsuran;

        $totalBunga = JurnalDetail::select('debit')
            ->where('akun_id', 15)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $bunga = $totalBunga;

        $totalPajak = JurnalDetail::select('debit')
            ->where('akun_id', 16)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('debit');
        $pajak = $totalPajak;

        $totalPenjualan = JurnalDetail::select('credit')
            ->where('akun_id', 17)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('credit');
        $penjualan = $totalPenjualan;

        $totalPinjaman = JurnalDetail::select('credit')
            ->where('akun_id', 18)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('credit');
        $pinjaman = $totalPinjaman;

        // count all laba dan rugi
        $totalPendapatan = $penjualan + $pinjaman;
        $labaKotor = $bahanBaku + $bahanPembantu + $buruh + $transport + $produksi + $gajiBoss + $gajiKaryawan + $marketing + $alatTulis + $pajak;
        $totalLabaKotor = $totalPendapatan - $labaKotor;
        $totalBebanOperasional = $asset + $maintain + $listrikAir + $administrasi + $angsuran + $bunga ;
        $totalLabaBersih = $totalLabaKotor - $totalBebanOperasional;
    
        LabaRugi::create([
            'laba_rugi' => $totalLabaBersih,
        ]);

        $pdf = PDF::loadview('laba-rugi.laporan',
            [
                'penjualan' => $penjualan,
                'pinjaman' => $pinjaman,
                'bahanBaku' => $bahanBaku,
                'bahanPembantu' => $bahanPembantu,
                'buruh' => $buruh,
                'transport' => $transport,
                'produksi' => $produksi,
                'gajiBoss' => $gajiBoss,
                'gajiKaryawan' => $gajiKaryawan,
                'marketing' => $marketing,
                'alatTulis' => $alatTulis,
                'pajak' => $pajak,
                'asset' => $asset,
                'maintain' => $maintain,
                'listrikAir' => $listrikAir,
                'administrasi' => $administrasi,
                'angsuran' => $angsuran,
                'bunga' => $bunga,
                'labaKotor' => $labaKotor,
                'totalLabaKotor' => $totalLabaKotor,
                'totalPendapatan' => $totalPendapatan,
                'totalBebanOperasional' => $totalBebanOperasional,
                'totalLabaBersih' => $totalLabaBersih,
                'reportMonthYear' => 'Laporan Bulan '. $month . ' Tahun ' . $year,
            ]
        );
        return $pdf->stream('laporan-laba-rugi-'.$request->month.'.pdf');
    }
}
