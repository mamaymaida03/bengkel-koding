<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;

    // Definisikan nama tabel
    protected $table = 'jadwal_periksa';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',  // Menambahkan kolom status
    ];

    // Menambahkan cast untuk kolom status agar menjadi boolean
    protected $casts = [
        'status' => 'boolean',  // Agar Laravel menganggap status sebagai boolean
    ];

    // Relasi dengan Dokter (Many-to-One)
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    // Relasi dengan DaftarPoli (One-to-Many)
    public function daftarPolis()
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal');
    }
}
