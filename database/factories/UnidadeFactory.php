<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Morador;
use App\Models\Proprietario;
use App\Models\Unidade;

class UnidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unidade::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->word(),
            'tipo' => fake()->randomElement(["apartamento","loft","casa","vila"]),
            'bloco' => fake()->word(),
            'proprietario_id' => Proprietario::factory(),
            'proprietario_id_id' => Morador::factory(),
        ];
    }
}
