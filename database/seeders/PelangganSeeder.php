<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggan = [
            ['nama' => 'Andi Pratama', 'tipe' => 'siswa', 'no_hp' => '081234567801'],
            ['nama' => 'Siti Nurhaliza', 'tipe' => 'siswa', 'no_hp' => '081234567802'],
            ['nama' => 'Budi Santoso', 'tipe' => 'guru', 'no_hp' => '081234567803'],
            ['nama' => 'Dewi Lestari', 'tipe' => 'guru', 'no_hp' => '081234567804'],
            ['nama' => 'Rina Kurniawati', 'tipe' => 'umum', 'no_hp' => '081234567805'],
        ];

        foreach ($pelanggan as $data) {
            Pelanggan::updateOrCreate(
                ['no_hp' => $data['no_hp']],
                $data,
            );
        }
    }
}
