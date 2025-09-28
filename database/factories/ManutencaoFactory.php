<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Espaco;
use App\Models\Manutencao;
use App\Models\Morador;
use App\Models\Responsavel;

class ManutencaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manutencao::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'espaco_id' => Espaco::factory(),
            'tipo' => fake()->randomElement(["preventiva","corretiva"]),
            'responsavel_id' => Responsavel::factory(),
            'descricao' => fake()->text(),
            'data_prevista' => fake()->dateTime(),
            'data_conclusao' => fake()->dateTime(),
            'status' => fake()->randomElement(["pendente","em_andamento","concluida"]),
            'responsavel_id_id' => Morador::factory(),
        ];
    }
}
