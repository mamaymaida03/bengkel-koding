<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    use HasFactory;

    // Definisikan nama tabel (jika berbeda dari nama model)
    protected $table = 'daftar_poli';

    // Definisikan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian'
    ];

    // Relasi dengan Pasien (Many-to-One)
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    // Relasi dengan JadwalPeriksa (Many-to-One)
    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    // Relasi dengan Periksa (One-to-Many)
    public function periksas()
    {
        return $this->hasMany(Periksa::class, 'id_daftar_poli');
    }
}
