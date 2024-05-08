<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::create([
            'nama' => 'Harga',
            'bobot' => 3,
        ]);

        Kriteria::create([
            'nama' => 'Durasi',
            'bobot' => 2,
        ]);

        Kriteria::create([
            'nama' => 'Keahlian Trapis',
            'bobot' => 4,
        ]);
    }
}
