<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Espaco;
use App\Models\Limpeza;
use App\Models\Morador;
use App\Models\Responsavel;

class LimpezaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Limpeza::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'espaco_id' => Espaco::factory(),
            'responsavel_id' => Responsavel::factory(),
            'data' => fake()->dateTime(),
            'status' => fake()->randomElement(["pendente","concluida","em_andamento"]),
            'responsavel_id_id' => Morador::factory(),
        ];
    }
}
