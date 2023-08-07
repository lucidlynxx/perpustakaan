<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'buku_id' => mt_rand(1, 50),
            'siswa_id' => mt_rand(1, 30),
            'slug' => Str::random(8),
            'tglPinjam' => fake()->date('Y_m_d'),
            'tglKembali' => fake()->date('Y_m_d'),
            'status' => collect(fake()->randomElements(['pinjam', 'kembali'], 1))->implode(''),
        ];
    }
}
