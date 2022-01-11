<?php

namespace Database\Seeders;

use App\Models\Fabricante;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FabricanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) {
            Fabricante::create(
                [
                    'nombre' => $faker->name(),
                    'direccion' => $faker->address(),
                    'telefono' => $faker->randomNumber(9)
                ]
            );
        }
    }
}
