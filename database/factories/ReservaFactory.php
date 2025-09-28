<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Espaco;
use App\Models\Morador;
use App\Models\Reserva;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'morador_id' => Morador::factory(),
            'espaco_id' => Espaco::factory(),
            'status' => fake()->randomElement(["pendente","confirmada","cancelada"]),
            'valor' => fake()->randomFloat(2, 0, 999999.99),
            'data' => fake()->dateTime(),
        ];
    }
}
