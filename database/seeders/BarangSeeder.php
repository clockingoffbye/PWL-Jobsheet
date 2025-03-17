<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => '1',
                'barang_nama' => 'Laptop',
                'harga_beli' => 5000000,
                'harga_jual' => 6000000,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => '2',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 3000000,
                'harga_jual' => 3500000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => '3',
                'barang_nama' => 'Kaos',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => '4',
                'barang_nama' => 'Jaket',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => '5',
                'barang_nama' => 'Nasi Kotak',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => '6',
                'barang_nama' => 'Mie Instan',
                'harga_beli' => 2500,
                'harga_jual' => 3500,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => '7',
                'barang_nama' => 'Kopi',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => '8',
                'barang_nama' => 'Teh Botol',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => '9',
                'barang_nama' => 'Pulpen',
                'harga_beli' => 2000,
                'harga_jual' => 4000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => '10',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
