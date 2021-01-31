<!DOCTYPE html>
<html>
<head>
	<title>Arus Kas</title>
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
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
	</style>
	<center>
        <h5>Arus Kas</h4>
		<h5>Chibi Chef</h4>
		<h6>{{$reportMonthYear}}</h5>
	</center>
	<table class='table' width="100%">
		<tbody>
			<tr>
                <td class="font-weight-bold">Arus Kas Masuk</td>
                <td></td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Penjualan</p></td>
                <td class="text-right border-0">{{number_format($totalPenjualan)}}</td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Piutang</p></td>
                <td class="text-right border-0">{{number_format($ar)}}</td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Pendapatan Lain-Lain</p></td>
                <td class="text-right border-0">{{number_format($pendapatanLain)}}</td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Investasi Pemilik</p></td>
                <td class="text-right border-0">{{number_format($investasi)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold"><p class="ml-6 mb-0">Total Arus Kas Masuk</p></td>
                <td class="text-right border-0">{{number_format($totalArusKasMasuk)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Arus Kas Keluar</td>
                <td></td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Beban</p></td>
                <td class="text-right border-0">{{number_format($totalBebanOperasional)}}</td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Pembayaran Utang</p></td>
                <td class="text-right border-0">{{number_format($ap)}}</td>
            </tr>
            <tr>
                <td><p class="ml-4 mb-0">Pengambilan Prive</p></td>
                <td class="text-right border-0">{{number_format($priveMinus)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold"><p class="ml-6 mb-0">Total Arus Kas Keluar</p></td>
                <td class="text-right border-0">{{number_format($totalArusKasKeluar)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Total Arus Kas Bersih</td>
                <td class="text-right border-0">{{number_format($totalKas)}}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>