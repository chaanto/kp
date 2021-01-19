<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('akuns')->delete();
        $akuns = [
            [
                'code' => '1',
                'name' => 'Asset (Investasi)',
            ],
            [
                'code' => '2',
                'name' => 'Pembelian Bahan Baku',
            ],
            [
                'code' => '3',
                'name' => 'Pembelian Bahan Pembantu',
            ],
            [
                'code' => '4',
                'name' => 'Upah Buruh Produksi',
            ],
            [
                'code' => '5',
                'name' => 'Transport (Pengiriman Produk)',
            ],
            [
                'code' => '6',
                'name' => 'Biaya Produksi Lain-Lain',
            ],
            [
                'code' => '7',
                'name' => 'Gaji Pimpinan',
            ],
            [
                'code' => '8',
                'name' => 'Gaji Staf Administrasi dan Umum',
            ],
            [
                'code' => '9',
                'name' => 'Biaya Pemeliharaan',
            ],
            [
                'code' => '10',
                'name' => 'Biaya Pemasaran',
            ],
            [
                'code' => '11',
                'name' => 'Alat Tulis Kantor',
            ],
            [
                'code' => '12',
                'name' => 'Listrik, Air, dan Telepon',
            ],
            [
                'code' => '13',
                'name' => 'Biaya Administrasi Lain-Lain',
            ],
            [
                'code' => '14',
                'name' => 'Angsuran Pokok',
            ],
            [
                'code' => '15',
                'name' => 'Biaya Bunga',
            ],
            [
                'code' => '16',
                'name' => 'Biaya Pajak',
            ],
            [
                'code' => '17',
                'name' => 'Pendapatan',
            ],
            [
                'code' => '18',
                'name' => 'Penerimaan Pinjaman',
            ],
            [
                'code' => '19',
                'name' => 'Modal',
            ],
            [
                'code' => '20',
                'name' => 'Penarikan Pribadi',
            ],
            [
                'code' => '21',
                'name' => 'Kas',
            ],
            [
                'code' => '22',
                'name' => 'Piutang',
            ],
            [
                'code' => '23',
                'name' => 'Hutang',
            ],
            [
                'code' => '25',
                'name' => 'Bangunan',
            ],
            [
                'code' => '26',
                'name' => 'Wesel Bayar',
            ],
            [
                'code' => '27',
                'name' => 'Persediaan',
            ],
            [
                'code' => '28',
                'name' => 'Kendaraan',
            ],
            [
                'code' => '29',
                'name' => 'Pendapatan Lain-Lain',
            ],
        ];
        foreach ($akuns as $akun) {
            Akun::create($akun);
        }
    }
}
