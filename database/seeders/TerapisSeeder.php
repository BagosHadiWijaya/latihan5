<?php

namespace Database\Seeders;

use App\Models\Terapis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerapisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Terapis::create([
            'nama' => 'Budi',
            'alamat' => 'Jl. Jendral Sudirman No. 1',
            'jenis_kelamin' => 'L',
        ]);

        Terapis::create([
            'nama' => 'Siti',
            'alamat' => 'Jl. Jendral Sudirman No. 2',
            'jenis_kelamin' => 'P',
        ]);

        Terapis::create([
            'nama' => 'Joko',
            'alamat' => 'Jl. Jendral Sudirman No. 3',
            'jenis_kelamin' => 'L',
        ]);

        Terapis::create([
            'nama' => 'Rina',
            'alamat' => 'Jl. Jendral Sudirman No. 4',
            'jenis_kelamin' => 'P',
        ]);
    }
}
