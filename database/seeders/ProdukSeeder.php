<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kategori_id'  => 1,
                'kode_produk'  => 'PRD001',
                'nama_produk'  => 'Buku Tulis Sidu 58',
                'harga'        => 5000,
                'stok'         => 100,
            ],
            [
                'kategori_id'  => 1,
                'kode_produk'  => 'PRD002',
                'nama_produk'  => 'Pensil 2B Faber Castell',
                'harga'        => 3500,
                'stok'         => 150,
            ],
            [
                'kategori_id'  => 2,
                'kode_produk'  => 'PRD003',
                'nama_produk'  => 'Penghapus Staedtler',
                'harga'        => 2500,
                'stok'         => 80,
            ],
            [
                'kategori_id'  => 2,
                'kode_produk'  => 'PRD004',
                'nama_produk'  => 'Penggaris 30cm',
                'harga'        => 4000,
                'stok'         => 60,
            ],
            [
                'kategori_id'  => 3,
                'kode_produk'  => 'PRD005',
                'nama_produk'  => 'Snack Chitato',
                'harga'        => 8000,
                'stok'         => 50,
            ],
        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}