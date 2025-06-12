<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obat::create([
            'nama_obat' => 'Paracetamol',
            'kemasan' => 'Tablet',
            'harga' => 15000
        ]);

        Obat::create([
            'nama_obat' => 'Amoxicillin',
            'kemasan' => 'Kapsul',
            'harga' => 25000
        ]);

        Obat::create([
            'nama_obat' => 'Ibuprofen',
            'kemasan' => 'Tablet',
            'harga' => 20000
        ]);

        Obat::create([
            'nama_obat' => 'Cetirizine',
            'kemasan' => 'Tablet',
            'harga' => 18000
        ]);

        Obat::create([
            'nama_obat' => 'Aspirin',
            'kemasan' => 'Tablet',
            'harga' => 22000
        ]);
    }
}
