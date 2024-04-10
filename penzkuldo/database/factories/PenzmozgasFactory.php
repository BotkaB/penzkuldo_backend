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
        $kuldo = Szamla::all()->random()->id;
        $cimzett = null;
        do {
            $cimzett = Szamla::all()->random()->id;
        } while ($cimzett == $kuldo);

        return [
            'kuldo_szamla' => $kuldo,
            'cimzett_szamla' =>$cimzett ,
            'osszeg' => rand(100, 10000000),
            'kuldes_idopont' => fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
