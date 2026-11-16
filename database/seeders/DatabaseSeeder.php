<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

=======
    public function run(): void
    {
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

<<<<<<< HEAD
        // Urutan penting: sesuai dependensi foreign key.
        $this->call([
            KategoriSeeder::class,
            PelangganSeeder::class,
            ProdukSeeder::class,
            TransaksiSeeder::class,
        ]);
=======
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
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
    }
}
