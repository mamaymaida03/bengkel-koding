<?php 

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $countPasien = User::where('role', 'pasien')->count();
        $now = now();
        $yearMonth = $now->format('Ym');

        $users = [
            [
                'name' => 'Admin Utama',
                'email' => 'adminutama@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Kenangan No. 1, Jakarta',
                'no_hp' => '081111111111',
                'role' => 'admin',
                'no_ktp' => '3201010101010001',
                'no_rm' => null,
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dr. Budi Santoso',
                'email' => 'drbudi@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Sehat No. 2, Bandung',
                'no_hp' => '082222222222',
                'role' => 'dokter',
                'no_ktp' => '3202020202020002',
                'no_rm' => null,
                'poli_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Siti Aisyah',
                'email' => 'pasien1@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Mawar No. 3, Bekasi',
                'no_hp' => '083333333333',
                'role' => 'pasien',
                'no_ktp' => '3203030303030003',
                'no_rm' => $yearMonth . '-' . str_pad(++$countPasien, 3, '0', STR_PAD_LEFT),
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dr. Clara Dewi',
                'email' => 'drclara@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Melati No. 4, Surabaya',
                'no_hp' => '084444444444',
                'role' => 'dokter',
                'no_ktp' => '3204040404040004',
                'no_rm' => null,
                'poli_id' => 3,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Rizky Hidayat',
                'email' => 'pasien2@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Mangga No. 5, Medan',
                'no_hp' => '085555555555',
                'role' => 'pasien',
                'no_ktp' => '3205050505050005',
                'no_rm' => $yearMonth . '-' . str_pad(++$countPasien, 3, '0', STR_PAD_LEFT),
                'poli_id' => null,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dr. Andi Pratama',
                'email' => 'drandi@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Anggur No. 6, Makassar',
                'no_hp' => '086666666666',
                'role' => 'dokter',
                'no_ktp' => '3206060606060006',
                'no_rm' => null,
                'poli_id' => 2,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dr. Lina Marlina',
                'email' => 'drlina@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Semangka No. 8, Yogyakarta',
                'no_hp' => '088899900011',
                'role' => 'dokter',
                'no_ktp' => '3207070707070007',
                'no_rm' => null,
                'poli_id' => 2,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dr. Fajar Aditya',
                'email' => 'drfajar@example.com',
                'email_verified_at' => $now,
                'password' => bcrypt('password123'),
                'alamat' => 'Jl. Pisang No. 9, Balikpapan',
                'no_hp' => '089900011122',
                'role' => 'dokter',
                'no_ktp' => '3208080808080008',
                'no_rm' => null,
                'poli_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
