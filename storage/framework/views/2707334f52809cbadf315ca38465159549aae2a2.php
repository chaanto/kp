<!DOCTYPE html>
<html>
<head>
    <title>Laporan Neraca</title>
	
</head>
<body>
	<style type="text/css">
        .mb-0 {
            margin: 0 !important;
        }
        h1,
        .h1 {
            font-size: 2.25rem;
        }
        h2,
        .h2 {
            font-size: 1.8rem;
        }
        h3,
        .h3 {
            font-size: 1.575rem;
        }
        h4,
        .h4 {
            font-size: 1.35rem;
        }
        h5,
        .h5 {
            font-size: 1.125rem;
        }
        h6,
        .h6 {
            font-size: 0.9rem;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
		.table th,
        .table td {
            padding: 5px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .font-weight-bold {
            font-weight: 700 !important;
        }
        .ml-4,
        .mx-4 {
            margin-left: 1.5rem !important;
        }
        .w-100 {
            width: 100% !important;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .w-50 {
            width: 50% !important;
        }
        .float-right {
            float: right !important;
        }
        .float-left {
            float: left !important;
        }
	</style>
	<center>
        <h5>Laporan Neraca</h4>
		<h5>Chibi Chef</h4>
		<h6><?php echo e($reportMonthYear); ?></h5>
    </center>

    <div class="row">
        <div class="col-6 float-left">
            <table class='table w-100' style="border: 1px solid black;">
                <tbody>
                    <tr>
                        <td class="font-weight-bold" >
                            <center>
                                Aktiva
                            </center>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" style="border:none;padding:2px 2px 2px 2px;">Aktiva Lancar</td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Kas</p></td>
                        <td  style="border:none;padding:2px 2px 2px 2px;"class="text-right border-0"><?php echo e(number_format($cashTotal)); ?></td>
                    </tr>
                        <tr>
                            <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Akun Piutang</p></td>
                            <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($ar)); ?></td>
                        </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Persediaan</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($totalPersediaan)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Aktiva Lancar</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalAktivaLancar)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Aktiva Tidak Lancar</td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Kendaraan</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($totalKendaraan)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Bangunan</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($totalBangunan)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Perlengkapan</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($total_perlengkapan)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Aktiva Tidak Lancar</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalAktivaTidakLancar)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Aktiva</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalAktiva)); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6 float-right">
            <table class='table w-100' style="border: 1px solid black;border-left:none;">
                <tbody>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">
                            <center>
                                Pasiva
                            </center>
                        </td>
                        <td style="border:none;padding:2px 2px 2px 2px;" style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Kewajiban Jangka Pendek</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Akun Hutang</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($ap)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Kewajiban Jangka Pendek</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($pasivaJP)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Kewajiban Jangka Panjang</td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Wessel Bayar</p></td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right border-0"><?php echo e(number_format($totalWesel)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Kewajiban Jangka Panjang</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($pasivaJPan)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Modal Pemilik</td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Modal</p></td>
                        <td  style="border:none;padding:2px 2px 2px 2px;"class="text-right border-0"><?php echo e(number_format($capitalTotal)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"><p class="ml-4 mb-0">Laba Ditahan</p></td>
                        <td  style="border:none;padding:2px 2px 2px 2px;"class="text-right border-0"><?php echo e(number_format($total_laba)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Modal</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($total_modal)); ?></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                        <td style="border:none;padding:2px 2px 2px 2px;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="font-weight-bold">Total Kewajiban dan Modal</td>
                        <td style="border:none;padding:2px 2px 2px 2px;" class="text-right font-weight-bold border-0"><?php echo e(number_format($totalKewajibanDanModal)); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\projectKp\kp\resources\views/neraca/laporan.blade.php ENDPATH**/ ?>