<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = [
        'nama',
        'bobot'
    ];

    public function nilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class, 'id_kriteria', 'id');
    }
}
