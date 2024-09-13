<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'BSI',
                'barang_nama' => 'BUSI Motor',
                'harga_beli' => 9000,
                'harga_jual' => 11000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'SPN',
                'barang_nama' => 'SPION Cembung',
                'harga_beli' => 48000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'REM',
                'barang_nama' => 'REM Mesin',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'STV',
                'barang_nama' => 'Smart TV',
                'harga_beli' => 4999000,
                'harga_jual' => 6000000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'LED',
                'barang_nama' => 'Lampu LED',
                'harga_beli' => 23000,
                'harga_jual' => 25000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'VCM',
                'barang_nama' => 'Vacum Cleaner',
                'harga_beli' => 480000,
                'harga_jual' => 500000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'STK',
                'barang_nama' => 'Stik Kentang',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'MKR',
                'barang_nama' => 'Makaroni',
                'harga_beli' => 20000,
                'harga_jual' => 22000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => 'CDY',
                'barang_nama' => 'Candy',
                'harga_beli' => 5000,
                'harga_jual' => 7500,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 4,
                'barang_kode' => 'TNR',
                'barang_nama' => 'Toner',
                'harga_beli' => 48000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 4,
                'barang_kode' => 'SC',
                'barang_nama' => 'Sun Screen',
                'harga_beli' => 73000,
                'harga_jual' => 75000,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 4,
                'barang_kode' => 'LPB',
                'barang_nama' => 'Lip Balm',
                'harga_beli' => 33000,
                'harga_jual' => 37000,
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 5,
                'barang_kode' => 'CRT',
                'barang_nama' => 'Crop Top',
                'harga_beli' => 100000,
                'harga_jual' => 120000,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 5,
                'barang_kode' => 'HD',
                'barang_nama' => 'Hoodie',
                'harga_beli' => 350000,
                'harga_jual' => 400000,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => 'JNS',
                'barang_nama' => 'Jeans',
                'harga_beli' => 148000,
                'harga_jual' => 150000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}