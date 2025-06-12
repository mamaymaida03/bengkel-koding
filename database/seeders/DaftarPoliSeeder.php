<?php

namespace Database\Seeders;

use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Database\Seeder;

class DaftarPoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DaftarPoli::create([
            'id_pasien' => Pasien::where('nama', 'Siti Aisyah')->first()->id,
            'id_jadwal' => JadwalPeriksa::where('id_dokter', 1)->first()->id,
            'keluhan' => 'Batuk parah',
            'no_antrian' => 1
        ]);

        DaftarPoli::create([
            'id_pasien' => Pasien::where('nama', 'Budi Santoso')->first()->id,
            'id_jadwal' => JadwalPeriksa::where('id_dokter', 2)->first()->id,
            'keluhan' => 'Sakit gigi',
            'no_antrian' => 2
        ]);

        DaftarPoli::create([
            'id_pasien' => Pasien::where('nama', 'Andi Pratama')->first()->id,
            'id_jadwal' => JadwalPeriksa::where('id_dokter', 3)->first()->id,
            'keluhan' => 'Demam tinggi',
            'no_antrian' => 3
        ]);

        DaftarPoli::create([
            'id_pasien' => Pasien::where('nama', 'Dewi Lestari')->first()->id,
            'id_jadwal' => JadwalPeriksa::where('id_dokter', 4)->first()->id,
            'keluhan' => 'Gangguan penglihatan',
            'no_antrian' => 4
        ]);

        DaftarPoli::create([
            'id_pasien' => Pasien::where('nama', 'Rudi Setiawan')->first()->id,
            'id_jadwal' => JadwalPeriksa::where('id_dokter', 5)->first()->id,
            'keluhan' => 'Nyeri dada',
            'no_antrian' => 5
        ]);
    }
}
