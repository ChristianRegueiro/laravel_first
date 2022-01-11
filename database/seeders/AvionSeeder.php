<?php

namespace Database\Seeders;

use App\Models\Avion;
use App\Models\Fabricante;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AvionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Averiguamos numero de fabricantes que hay.
        $total = Fabricante::all()->count();

        // Generamos 30 aviones.
        for ($i = 1; $i <= 30; $i++) {
            Avion::create(
                [
                    'modelo' => $faker->word(),
                    'longitud' => $faker->randomFloat(2, 10, 150),
                    'capacidad' => $faker->randomNumber(3),    // de 3 dígitos como máximo.
                    'velocidad' => $faker->randomNumber(4),    // de 4 dígitos como máximo.
                    'alcance' => $faker->randomNumber(),
                    'fabricante_id' => $faker->numberBetween(1, $total)
                ]
            );
        }
    }
}
