<?php

namespace Database\Factories;

use App\Models\Fabricante;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $total = Fabricante::all()->count();

        return [
            'modelo' => $this->faker->word(),
            'longitud' => $this->faker->randomFloat(2, 10, 150),
            'capacidad' => $this->faker->randomNumber(3),    // de 3 dígitos como máximo.
            'velocidad' => $this->faker->randomNumber(4),    // de 4 dígitos como máximo.
            'alcance' => $this->faker->randomNumber(),
            'fabricante_id' => $this->faker->numberBetween(1, $total)
        ];
    }
}
