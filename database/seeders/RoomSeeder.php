<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartment = Apartment::get();
        foreach ($apartment as $apartment) {
            Room::factory(5)->create([
                'apartment_id' => $apartment->id
            ]);
        }
    }
}
