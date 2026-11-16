<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Run in foreign-key dependency order. Category seeder is optional
        // because it is maintained by the other project module.
        $seeders = [
            __NAMESPACE__ . '\\KategoriSeeder',
            PelangganSeeder::class,
            ProdukSeeder::class,
            TransaksiSeeder::class,
        ];

        $this->call(array_values(array_filter(
            $seeders,
            fn (string $seeder): bool => class_exists($seeder),
        )));
    }
}
