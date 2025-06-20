<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Utama',
                'email' => 'adminutama@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Melati No. 10, Jakarta Selatan',
                'no_hp' => '081111111111',
                'role' => 'admin',
                'no_ktp' => 3201010101010001,
                'no_rm' => '202201-10',
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Budi Santoso',
                'email' => 'drbudi@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Mawar No. 23, Bandung',
                'no_hp' => '082222222222',
                'role' => 'dokter',
                'no_ktp' => 3202020202020002,
                'no_rm' => '202102-12',
                'poli_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aisyah',
                'email' => 'pasien1@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Anggrek No. 5, Bekasi',
                'no_hp' => '083333333333',
                'role' => 'pasien',
                'no_ktp' => 3203030303030003,
                'no_rm' => '202203-08',
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Clara Dewi',
                'email' => 'drclara@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Kenanga No. 8, Surabaya',
                'no_hp' => '084444444444',
                'role' => 'dokter',
                'no_ktp' => 3204040404040004,
                'no_rm' => '202204-05',
                'poli_id' => 3,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rizky Hidayat',
                'email' => 'pasien2@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Semangka No. 9, Medan',
                'no_hp' => '085555555555',
                'role' => 'pasien',
                'no_ktp' => 3205050505050005,
                'no_rm' => '202205-14',
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Andi Pratama',
                'email' => 'drandi@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Nangka No. 3, Makassar',
                'no_hp' => '086666666666',
                'role' => 'dokter',
                'no_ktp' => 3206060606060006,
                'no_rm' => '202206-21',
                'poli_id' => 2,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
