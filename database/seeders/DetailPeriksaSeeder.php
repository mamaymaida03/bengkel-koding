<?php

namespace Database\Seeders;

use App\Models\DetailPeriksa;
use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Database\Seeder;

class DetailPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periksa1 = Periksa::where('biaya_periksa', 50000)->first();
        if ($periksa1) {
            DetailPeriksa::create([
                'id_periksa' => $periksa1->id,
                'id_obat' => Obat::where('nama_obat', 'Paracetamol')->first()->id
            ]);
        }

        $periksa2 = Periksa::where('biaya_periksa', 75000)->first();
        if ($periksa2) {
            DetailPeriksa::create([
                'id_periksa' => $periksa2->id,
                'id_obat' => Obat::where('nama_obat', 'Amoxicillin')->first()->id
            ]);
        }

        $periksa3 = Periksa::where('biaya_periksa', 60000)->first();
        if ($periksa3) {
            DetailPeriksa::create([
                'id_periksa' => $periksa3->id,
                'id_obat' => Obat::where('nama_obat', 'Ibuprofen')->first()->id
            ]);
        }

        $periksa4 = Periksa::where('biaya_periksa', 70000)->first();
        if ($periksa4) {
            DetailPeriksa::create([
                'id_periksa' => $periksa4->id,
                'id_obat' => Obat::where('nama_obat', 'Cetirizine')->first()->id
            ]);
        }

        $periksa5 = Periksa::where('biaya_periksa', 80000)->first();
        if ($periksa5) {
            DetailPeriksa::create([
                'id_periksa' => $periksa5->id,
                'id_obat' => Obat::where('nama_obat', 'Aspirin')->first()->id
            ]);
        }
    }
}
