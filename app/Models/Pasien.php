<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pasien extends Authenticatable
{
    use Notifiable;

    // Definisikan nama tabel jika diperlukan (jika tabel berbeda dengan nama model)
    protected $table = 'pasien';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm'
    ];

    // Kolom yang tidak bisa diubah secara massal
    protected $guarded = [];

    // Jika Anda memerlukan cast atau atribut lainnya, bisa didefinisikan di sini
}
