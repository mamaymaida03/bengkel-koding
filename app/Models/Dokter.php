<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dokter extends Authenticatable
{
    use Notifiable;

    // Definisikan nama tabel jika diperlukan
    protected $table = 'dokter';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama', 'alamat', 'no_hp', 'id_poli'
    ];

    // Kolom yang tidak bisa diubah secara massal
    protected $guarded = [];
}
