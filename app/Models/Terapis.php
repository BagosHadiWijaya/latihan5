<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapis extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_terapis', 'id');
    }
}
