<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Firman Adi Pratama',
            'username' => 'firman',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Sesama',
            'noTelepon' => '085694206942',
            'jenisKelamin' => 'laki-laki'
        ]);

        User::create([
            'name' => 'Dzaky Syahrizal',
            'username' => 'jumpinJackFlash',
            'password' => bcrypt('password'),
            'alamat' => 'Groove street',
            'noTelepon' => '082249486237',
            'jenisKelamin' => 'laki-laki'
        ]);

        User::factory(4)->create();

        Siswa::factory(30)->create();

        Buku::factory(50)->create();

        // Peminjaman::factory(10)->create();

        Rak::create([
            'namaRak' => 'Rak I',
            'slug' => 'rak-i'
        ]);
        Rak::create([
            'namaRak' => 'Rak II',
            'slug' => 'rak-ii'
        ]);
        Rak::create([
            'namaRak' => 'Rak III',
            'slug' => 'rak-iii'
        ]);
        Rak::create([
            'namaRak' => 'Rak IV',
            'slug' => 'rak-iv'
        ]);
        Rak::create([
            'namaRak' => 'Rak V',
            'slug' => 'rak-v'
        ]);
        Rak::create([
            'namaRak' => 'Rak VI',
            'slug' => 'rak-vi'
        ]);
        Rak::create([
            'namaRak' => 'Rak VII',
            'slug' => 'rak-vii'
        ]);
    }
}
