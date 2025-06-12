<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    // Definisikan nama tabel (jika berbeda dari nama model)
    protected $table = 'poli';

    // Definisikan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_poli',
        'keterangan'
    ];

    // Relasi dengan Dokter (One-to-Many)
    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_poli');
    }
}
