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
            <h6><?php echo e($reportMonthYear); ?></h5>
        </center>
        <table class='table'>
            <tbody>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="font-weight-bold">Pendapatan</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"  class="text-right font-weight-bold border-0"><?php echo e(number_format($totalPendapatan)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Harga Pokok</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Pembelian Bahan Baku</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($bahanBaku)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Transport (Pengiriman Produk)</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($transport)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Harga Pokok</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0"><?php echo e(number_format($labaKotor)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Laba Kotor</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalLabaKotor)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Beban Operasional</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Gaji</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($gajiKaryawan)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Pemeliharaan</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($maintain)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Listrik, Air, dan Telepon</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($listrikAir)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Administrasi Lain-Lain</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($administrasi)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Sewa</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($sewa)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Penyusutan Kendaraan</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($penyusutan_kendaraan)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;"><p class="ml-4 mb-0">Biaya Iklan</p></td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right border-0"><?php echo e(number_format($marketing)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Beban Operasional</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalBebanOperasional)); ?></td>
                </tr>
                <tr>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="font-weight-bold">Total Laba Bersih</td>
                    <td style="padding:0px 3px 0px 3px; border:1px solid black;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalLabaBersih)); ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html><?php /**PATH C:\xampp\htdocs\projectKp\kp\resources\views/laba-rugi/laporan.blade.php ENDPATH**/ ?>