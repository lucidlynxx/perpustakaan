<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        return [
            'nisn' => fake()->randomNumber(5, true) . fake()->randomNumber(5, true),
            'nama' => $name,
            'slug' => Str::slug($name),
            'kelas' => collect(fake()->randomElements(['VII', 'VIII', 'IX'], 1))->implode(''),
            'tglLahir' => fake()->date('Y_m_d'),
            'alamat' => fake()->streetAddress(),
            'jenisKelamin' => collect(fake()->randomElements(['laki-laki', 'perempuan'], 1))->implode(''),
        ];
    }
}
