<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MovimentacaoGaragem;
use App\Models\Veiculo;

class MovimentacaoGaragemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovimentacaoGaragem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'veiculo_id' => Veiculo::factory(),
            'entrada' => fake()->dateTime(),
            'saida' => fake()->dateTime(),
            'tipo' => fake()->randomElement(["visitante","permanente"]),
        ];
    }
}
