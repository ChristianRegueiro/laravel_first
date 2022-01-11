<?php

namespace Database\Seeders;

use App\Models\Avion;
use App\Models\Fabricante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call('FabricanteSeeder');
        // $this->call('AvionSeeder');

        // $this->call([
        //     FabricanteSeeder::class,
        //     AvionSeeder::class
        // ]);

        Fabricante::factory(5)->create();
        Avion::factory(30)->create();
    }
}
