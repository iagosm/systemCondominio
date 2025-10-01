<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\GarageMovement;
use App\Models\Vehicle;

class GarageMovementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GarageMovement::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'entry' => fake()->dateTime(),
            'exit' => fake()->dateTime(),
            'type' => fake()->randomElement(["visitante","permanente"]),
        ];
    }
}
