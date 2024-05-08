<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternatif::create([
            'nama' => 'Pijat Relaksasi',
            'harga' => 200000,
            'durasi' => 60,
            'deskripsi' => 'Pijat relaksasi adalah jenis pijat yang bertujuan untuk menghilangkan stres dan ketegangan otot.'
        ]);

        Alternatif::create([
            'nama' => 'Pijat Refleksi',
            'harga' => 150000,
            'durasi' => 45,
            'deskripsi' => 'Pijat refleksi adalah jenis pijat yang bertujuan
            untuk merangsang titik-titik refleksi pada telapak kaki.'
        ]);

        Alternatif::create([
            'nama' => 'Pijat Tradisional',
            'harga' => 100000,
            'durasi' => 30,
            'deskripsi' => 'Pijat tradisional adalah jenis pijat yang bertujuan untuk menghilangkan ketegangan otot.'
        ]);

        Alternatif::create([
            'nama' => 'Pijat Urut',
            'harga' => 80000,
            'durasi' => 30,
            'deskripsi' => 'Pijat urut adalah jenis pijat yang bertujuan untuk menghilangkan ketegangan otot.'
        ]);

        Alternatif::create([
            'nama' => 'Pijat Aromaterapi',
            'harga' => 250000,
            'durasi' => 60,
            'deskripsi' => 'Pijat aromaterapi adalah jenis pijat yang bertujuan untuk menghilangkan stres dan ketegangan otot.'
        ]);
    }
}
