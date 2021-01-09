<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Laba Rugi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 12pt;
            }
        </style>
        <center>
            <h5>Laporan Laba & Rugi</h4>
            <h5>Chibi Chef</h4>
            <h6>{{$reportMonthYear}}</h5>
        </center>
        <table class='table'>
            <tbody>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Pendapatan</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="text-right border-0"></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" ><p class="ml-4 mb-0">Penerimaan Penjualan</p></td>
                    <td style="padding:0px 0px 0px 0px; border:1px solid black;"  class="text-right border-0">{{number_format($penjualan)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" ><p class="ml-4 mb-0">Penerimaan Pinjaman</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="text-right border-0">{{number_format($pinjaman)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="font-weight-bold">Total Pendapatan</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="text-right font-weight-bold border-0">{{number_format($totalPendapatan)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Harga Pokok</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Pembelian Bahan Baku</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($bahanBaku)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Pembelian Bahan Pembantu</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($bahanPembantu)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Upah Buruh Produksi</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($buruh)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Transport (Pengiriman Produk)</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($transport)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Produksi Lain-Lain</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($produksi)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Gaji Pimpinan</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($gajiBoss)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Gaji Staf Administrasi dan Umum</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($gajiKaryawan)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Pemasaran</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($marketing)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Alat Tulis Kantor</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($alatTulis)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Harga Pokok</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0">{{number_format($labaKotor)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Laba Kotor</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0">{{number_format($totalLabaKotor)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Beban Operasional</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Pembelian Asset (Investasi)</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($asset)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Pemeliharaan</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($maintain)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Listrik, Air, dan Telepon</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($listrikAir)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Administrasi Lain-Lain</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($administrasi)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Angsuran Pokok</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($angsuran)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Bunga</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($bunga)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Pajak</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0">{{number_format($pajak)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Beban Operasional</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0">{{number_format($totalBebanOperasional)}}</td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Laba Bersih</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0">{{number_format($totalLabaBersih)}}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>