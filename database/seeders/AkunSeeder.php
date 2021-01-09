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
                'code' => '1.',
                'name' => 'Pembelian Asset (Investasi)',
            ],
            [
                'code' => '1.1.',
                'name' => 'Pembelian Bahan Baku',
            ],
            [
                'code' => '1.1.1.',
                'name' => 'Pembelian Bahan Pembantu',
            ],
            [
                'code' => '1.1.2.',
                'name' => 'Upah Buruh Produksi',
            ],
            [
                'code' => '1.1.3.',
                'name' => 'Transport (Pengiriman Produk)',
            ],
            [
                'code' => '1.1.4.',
                'name' => 'Biaya Produksi Lain-Lain',
            ],
            [
                'code' => '1.1.5.',
                'name' => 'Gaji Pimpinan',
            ],
            [
                'code' => '1.1.6.',
                'name' => 'Gaji Staf Administrasi dan Umum',
            ],
            [
                'code' => '1.1.7.',
                'name' => 'Biaya Pemeliharaan',
            ],
            [
                'code' => '1.1.8.',
                'name' => 'Biaya Pemasaran',
            ],
            [
                'code' => '1.1.9.',
                'name' => 'Alat Tulis Kantor',
            ],
            [
                'code' => '1.1.10.',
                'name' => 'Listrik, Air, dan Telepon',
            ],
            [
                'code' => '1.1.11.',
                'name' => 'Biaya Administrasi Lain-Lain',
            ],
            [
                'code' => '1.2.',
                'name' => 'Angsuran Pokok',
            ],
            [
                'code' => '1.2.1.',
                'name' => 'Biaya Bunga',
            ],
            [
                'code' => '1.2.2.',
                'name' => 'Biaya Pajak',
            ],
            [
                'code' => '1.2.3.',
                'name' => 'Penerimaan Penjualan',
            ],
            [
                'code' => '1.2.4.',
                'name' => 'Penerimaan Pinjaman',
            ],
        ];
        foreach ($akuns as $akun) {
            Akun::create($akun);
        }
    }
}
