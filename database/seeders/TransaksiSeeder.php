<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'produk_id'    => 1,
                'pelanggan_id' => 1,
                'tanggal'      => '2025-09-01',
                'jumlah'       => 2,
                'total'        => 10000,
            ],
            [
                'produk_id'    => 2,
                'pelanggan_id' => 2,
                'tanggal'      => '2025-09-02',
                'jumlah'       => 3,
                'total'        => 10500,
            ],
            [
                'produk_id'    => 3,
                'pelanggan_id' => 1,
                'tanggal'      => '2025-09-03',
                'jumlah'       => 5,
                'total'        => 12500,
            ],
            [
                'produk_id'    => 4,
                'pelanggan_id' => 3,
                'tanggal'      => '2025-09-04',
                'jumlah'       => 1,
                'total'        => 4000,
            ],
            [
                'produk_id'    => 5,
                'pelanggan_id' => 2,
                'tanggal'      => '2025-09-05',
                'jumlah'       => 4,
                'total'        => 32000,
            ],
        ];

        foreach ($data as $item) {
            Transaksi::create($item);
            \App\Models\Produk::whereKey($item['produk_id'])->decrement('stok', $item['jumlah']);
        }
    }
}
