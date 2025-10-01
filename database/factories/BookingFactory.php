<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Resident;
use App\Models\Space;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'space_id' => Space::factory(),
            'status' => fake()->randomElement(["pendente","confirmada","cancelada"]),
            'price' => fake()->randomFloat(2, 0, 999999.99),
            'date' => fake()->dateTime(),
        ];
    }
}
