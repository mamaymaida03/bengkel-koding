<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    // Definisikan nama tabel (jika berbeda dari nama model)
    protected $table = 'obat';

    // Definisikan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    // Relasi dengan DetailPeriksa (One-to-Many)
    public function detailPeriksas()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}
