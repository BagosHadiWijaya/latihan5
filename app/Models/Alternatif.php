<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $fillable = [
        'nama',
        'harga',
        'durasi',
        'deskripsi',
    ];

    public function nilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class, 'id_alternatif', 'id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_alternatif', 'id');
    }
}
