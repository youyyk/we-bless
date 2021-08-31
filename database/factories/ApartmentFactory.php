<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $floor = $this->faker->numberBetween(2,20);
        return [
            'name' => $this->faker->firstName(),
            'num_floor' => $floor,
            'num_room' => $floor * $this->faker->numberBetween(5,12)
        ];
    }
}
