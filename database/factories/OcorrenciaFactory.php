<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Morador;
use App\Models\Ocorrencia;

class OcorrenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ocorrencia::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'morador_id' => Morador::factory(),
            'titulo' => fake()->word(),
            'descricao' => fake()->text(),
            'status' => fake()->randomElement(["aberta","em_andamento","resolvida"]),
        ];
    }
}
