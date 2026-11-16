<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            __NAMESPACE__ . '\\KategoriSeeder',
            __NAMESPACE__ . '\\PelangganSeeder',
            ProdukSeeder::class,
            TransaksiSeeder::class,
        ];

        // Seeder kategori dan pelanggan dimiliki bagian tugas lain.
        // Panggil otomatis saat file seeder tersebut sudah tersedia.
        $availableSeeders = array_values(array_filter(
            $seeders,
            fn (string $seeder): bool => class_exists($seeder),
        ));

        $this->call($availableSeeders);
    }
}
