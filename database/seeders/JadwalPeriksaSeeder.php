<?php

namespace Database\Seeders;

use App\Models\JadwalPeriksa;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JadwalPeriksa::create([
            'id_dokter' => Dokter::where('nama', 'Dr. Andi')->first()->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '12:00:00',
            'status' => true,  // Menambahkan nilai status
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Dokter::where('nama', 'Dr. Budi')->first()->id,
            'hari' => 'Selasa',
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '13:00:00',
            'status' => true,  // Menambahkan nilai status
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Dokter::where('nama', 'Dr. Citra')->first()->id,
            'hari' => 'Rabu',
            'jam_mulai' => '10:00:00',
            'jam_selesai' => '14:00:00',
            'status' => false,  // Menambahkan nilai status
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Dokter::where('nama', 'Dr. Dini')->first()->id,
            'hari' => 'Kamis',
            'jam_mulai' => '11:00:00',
            'jam_selesai' => '15:00:00',
            'status' => true,  // Menambahkan nilai status
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Dokter::where('nama', 'Dr. Eko')->first()->id,
            'hari' => 'Jumat',
            'jam_mulai' => '07:00:00',
            'jam_selesai' => '11:00:00',
            'status' => false,  // Menambahkan nilai status
        ]);
    }
}
