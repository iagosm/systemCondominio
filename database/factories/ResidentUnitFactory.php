<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Models\ResidentUnit;
use App\Models\Unit;

class ResidentUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResidentUnit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'unit_id' => Unit::factory(),
            'type' => fake()->randomElement(["proprietario","inquilino"]),
        ];
    }
}
