<?php

namespace Database\Factories;
use App\Models\Szamla;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penzmozgas>
 */
class PenzmozgasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kuldo_szamla' => Szamla::all()->random()->id,
            'cimzett_szamla' => Szamla::all()->random()->id,
            'osszeg'=>rand(100, 10000000),
            'kuldes_idopont'=> fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
