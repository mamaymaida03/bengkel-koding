<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'nama' => 'Dr. Andi',
            'alamat' => 'Jl. Sehat No. 1',
            'no_hp' => '08123456789',
            'id_poli' => Poli::where('nama_poli', 'Poli Umum')->first()->id
        ]);

        Dokter::create([
            'nama' => 'Dr. Budi',
            'alamat' => 'Jl. Gigi No. 2',
            'no_hp' => '08123456780',
            'id_poli' => Poli::where('nama_poli', 'Poli Gigi')->first()->id
        ]);

        Dokter::create([
            'nama' => 'Dr. Citra',
            'alamat' => 'Jl. Anak No. 3',
            'no_hp' => '08123456781',
            'id_poli' => Poli::where('nama_poli', 'Poli Anak')->first()->id
        ]);

        Dokter::create([
            'nama' => 'Dr. Dini',
            'alamat' => 'Jl. Mata No. 4',
            'no_hp' => '08123456782',
            'id_poli' => Poli::where('nama_poli', 'Poli Mata')->first()->id
        ]);

        Dokter::create([
            'nama' => 'Dr. Eko',
            'alamat' => 'Jl. Jantung No. 5',
            'no_hp' => '08123456783',
            'id_poli' => Poli::where('nama_poli', 'Poli Jantung')->first()->id
        ]);
    }
}
