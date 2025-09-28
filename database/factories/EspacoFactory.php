<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Espaco;

class EspacoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Espaco::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->word(),
            'capacidade' => fake()->numberBetween(-10000, 10000),
            'valor' => fake()->randomFloat(2, 0, 999999.99),
        ];
    }
}
