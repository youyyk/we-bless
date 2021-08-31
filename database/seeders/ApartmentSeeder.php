<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartment = new Apartment();
        $apartment->name = "Kondro A";
        $apartment->num_floor = 5;
        $apartment->num_room = 25;
        $apartment->save();
        $apartment = new Apartment();
        $apartment->name = "Kondro B";
        $apartment->num_floor = 10;
        $apartment->num_room = 100;
        $apartment->save();
        $apartment = new Apartment();
        $apartment->name = "Kondro C";
        $apartment->num_floor = 8;
        $apartment->num_room = 64;
        $apartment->save();

        Apartment::factory(5)->create();
    }
}
