<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Andi',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 2,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Citra',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 1,
                'pembeli' => 'Dewi',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => Carbon::now()->subDays(1),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli' => 'Eko',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => Carbon::now()->subDays(2),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Fajar',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => Carbon::now()->subDays(3),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Gita',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => Carbon::now()->subDays(4),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Hadi',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => Carbon::now()->subDays(5),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Indra',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => Carbon::now()->subDays(6),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => Carbon::now()->subDays(7),
            ],
        ];
        DB::table('t_penjualan')->insertOrIgnore($data);
    }
}
