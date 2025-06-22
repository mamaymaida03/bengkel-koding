<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
        'role',
        'no_ktp',
        'poli_id',
        'no_rm', // agar bisa diisi manual saat seeding
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pasiens(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_pasien');
    }

    public function dokters(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    // Generate no_rm untuk pasien berdasarkan jumlah pasien yang sudah ada
    public static function generateNoRmPasien(): string
    {
        $prefix = now()->format('Ym');

        // Hitung hanya pasien yang sudah punya no_rm di bulan & tahun ini
        $jumlahPasienBulanIni = self::where('role', 'pasien')
            ->where('no_rm', 'like', $prefix . '-%')
            ->count() + 1;

        return $prefix . '-' . str_pad($jumlahPasienBulanIni, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        // Isi email_verified_at jika belum ada
        static::creating(function ($user) {
            if (is_null($user->email_verified_at)) {
                $user->email_verified_at = now();
            }
        });

        // Generate no_rm hanya untuk pasien
        static::created(function ($user) {
            if ($user->role === 'pasien' && empty($user->no_rm)) {
                $user->no_rm = self::generateNoRmPasien();
                $user->save();
            }
        });
    }
}
