<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Morador;
use App\Models\Veiculo;

class VeiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'morador_id' => Morador::factory(),
            'placa' => fake()->word(),
            'tipo' => fake()->randomElement(["carro","moto","bike"]),
        ];
    }
}
