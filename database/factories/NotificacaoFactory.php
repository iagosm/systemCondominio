<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Notificacao;
use App\Models\User;

class NotificacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notificacao::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'tipo' => fake()->word(),
            'mensagem' => fake()->text(),
            'status' => fake()->randomElement(["lida","nao_lida"]),
        ];
    }
}
