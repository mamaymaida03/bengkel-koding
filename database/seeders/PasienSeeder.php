<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Pasien::create([
            'nama' => 'Siti Aisyah',
            'alamat' => 'Jl. Mawar No. 10',
            'no_ktp' => '1234567890',
            'no_hp' => '08123456789',
            'no_rm' => 'P0001'
        ]);

        Pasien::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Melati No. 12',
            'no_ktp' => '2345678901',
            'no_hp' => '08123456780',
            'no_rm' => 'P0002'
        ]);

        Pasien::create([
            'nama' => 'Andi Pratama',
            'alamat' => 'Jl. Anggrek No. 15',
            'no_ktp' => '3456789012',
            'no_hp' => '08123456781',
            'no_rm' => 'P0003'
        ]);

        Pasien::create([
            'nama' => 'Dewi Lestari',
            'alamat' => 'Jl. Kenanga No. 17',
            'no_ktp' => '4567890123',
            'no_hp' => '08123456782',
            'no_rm' => 'P0004'
        ]);

        Pasien::create([
            'nama' => 'Rudi Setiawan',
            'alamat' => 'Jl. Cempaka No. 8',
            'no_ktp' => '5678901234',
            'no_hp' => '08123456783',
            'no_rm' => 'P0005'
        ]);
    }
}
