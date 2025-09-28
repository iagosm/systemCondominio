<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Morador;
use App\Models\MoradorUnidade;
use App\Models\Unidade;

class MoradorUnidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MoradorUnidade::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'morador_id' => Morador::factory(),
            'unidade_id' => Unidade::factory(),
            'tipo' => fake()->randomElement(["proprietario","inquilino"]),
        ];
    }
}
