<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Despesa;

class DespesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Despesa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->word(),
            'valor' => fake()->randomFloat(2, 0, 999999.99),
            'categoria' => fake()->word(),
            'data' => fake()->date(),
        ];
    }
}
