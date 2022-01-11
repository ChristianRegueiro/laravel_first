<?php

namespace Database\Factories;

use App\Models\Fabricante;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricanteFactory extends Factory
{
    protected $model = Fabricante::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
            [
                'nombre' => $this->faker->name(),
                'direccion' => $this->faker->address(),
                'telefono' => $this->faker->randomNumber(9)
            ];
    }
}
