<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Incident;
use App\Models\Resident;

class IncidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incident::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'status' => fake()->randomElement(["aberta","em_andamento","resolvida"]),
        ];
    }
}
