<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cleaning;
use App\Models\Resident;
use App\Models\Responsible;
use App\Models\Space;

class CleaningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cleaning::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'space_id' => Space::factory(),
            'responsible_id' => Responsible::factory(),
            'date' => fake()->dateTime(),
            'status' => fake()->randomElement(["pendente","concluida","em_andamento"]),
            'responsible_id_id' => Resident::factory(),
        ];
    }
}
