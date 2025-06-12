<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Menjalankan seeder untuk User
        $this->call([
            UserSeeder::class,
            PoliSeeder::class,
            DokterSeeder::class,
            JadwalPeriksaSeeder::class,
            PasienSeeder::class,
            DaftarPoliSeeder::class,
            PeriksaSeeder::class,
            DetailPeriksaSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
