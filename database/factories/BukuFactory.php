<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => fake()->word(),
            'slug' => fake()->slug(),
            'penulis' => fake()->name(),
            'penerbit' => fake()->company(),
            'tahun' => fake()->year(),
            'isbn' => fake()->randomNumber(8, true) . fake()->randomNumber(5, true),
            'jumlah' => mt_rand(1, 9),
            'rak_id' => mt_rand(1, 7)
        ];
    }
}
