<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    use HasFactory;

    // Definisikan nama tabel (jika berbeda dari nama model)
    protected $table = 'detail_periksa';

    // Definisikan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_periksa',
        'id_obat'
    ];

    // Relasi dengan Periksa (Many-to-One)
    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    // Relasi dengan Obat (Many-to-One)
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
