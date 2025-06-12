<?php

namespace Database\Seeders;

use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periksa::create([
            'id_daftar_poli' => DaftarPoli::where('no_antrian', 1)->first()->id,
            'tgl_periksa' => '2023-06-01',
            'catatan' => 'Pasien datang dengan keluhan batuk',
            'biaya_periksa' => 50000
        ]);

        Periksa::create([
            'id_daftar_poli' => DaftarPoli::where('no_antrian', 2)->first()->id,
            'tgl_periksa' => '2023-06-02',
            'catatan' => 'Pasien sakit gigi',
            'biaya_periksa' => 75000
        ]);

        Periksa::create([
            'id_daftar_poli' => DaftarPoli::where('no_antrian', 3)->first()->id,
            'tgl_periksa' => '2023-06-03',
            'catatan' => 'Pasien demam tinggi',
            'biaya_periksa' => 60000
        ]);

        Periksa::create([
            'id_daftar_poli' => DaftarPoli::where('no_antrian', 4)->first()->id,
            'tgl_periksa' => '2023-06-04',
            'catatan' => 'Pasien keluhan gangguan penglihatan',
            'biaya_periksa' => 70000
        ]);

        Periksa::create([
            'id_daftar_poli' => DaftarPoli::where('no_antrian', 5)->first()->id,
            'tgl_periksa' => '2023-06-05',
            'catatan' => 'Pasien keluhan nyeri dada',
            'biaya_periksa' => 80000
        ]);
    }
}
