<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 100
            ],
            [
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subDays(2),
                'stok_jumlah' => 50
            ],
            [
                'barang_id' => 3,
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(5),
                'stok_jumlah' => 75
            ],
            [
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subDays(1),
                'stok_jumlah' => 120
            ],
            [
                'barang_id' => 5,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now()->subDays(3),
                'stok_jumlah' => 90
            ],
            [
                'barang_id' => 6,
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(4),
                'stok_jumlah' => 110
            ],
            [
                'barang_id' => 7,
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subWeek(),
                'stok_jumlah' => 80
            ],
            [
                'barang_id' => 8,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now()->subDays(6),
                'stok_jumlah' => 70
            ],
            [
                'barang_id' => 9,
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(8),
                'stok_jumlah' => 95
            ],
            [
                'barang_id' => 10,
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subWeeks(2),
                'stok_jumlah' => 60
            ],
        ];

        DB::table('t_stok')->insert($data);
    }
}
