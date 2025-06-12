<?php

namespace Database\Seeders;
use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Poli::create([
        'nama_poli' => 'Poli Umum',
        'keterangan' => 'Melayani pemeriksaan umum',
    ]);
    Poli::create([
        'nama_poli' => 'Poli Gigi',
        'keterangan' => 'Melayani pemeriksaan gigi',
    ]);
    Poli::create([
        'nama_poli' => 'Poli Anak',
        'keterangan' => 'Melayani pemeriksaan anak',
    ]);
    Poli::create([
        'nama_poli' => 'Poli Mata',
        'keterangan' => 'Melayani pemeriksaan mata',
    ]);
    Poli::create([
        'nama_poli' => 'Poli Jantung',
        'keterangan' => 'Melayani pemeriksaan jantung',
    ]);
}
}
