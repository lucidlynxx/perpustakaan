<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
