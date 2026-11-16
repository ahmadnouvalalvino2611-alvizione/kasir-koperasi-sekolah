<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        // ID dibuat eksplisit karena ProdukSeeder memakai kategori_id 1-3.
        $kategori = [
            1 => 'Alat Tulis',
            2 => 'Perlengkapan Sekolah',
            3 => 'Makanan Ringan',
        ];

        foreach ($kategori as $id => $nama) {
            Kategori::updateOrCreate(['id' => $id], ['nama' => $nama]);
        }
    }
}
