<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Maintenance;
use App\Models\Resident;
use App\Models\Responsible;
use App\Models\Space;

class MaintenanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Maintenance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'space_id' => Space::factory(),
            'type' => fake()->randomElement(["preventiva","corretiva"]),
            'responsible_id' => Responsible::factory(),
            'description' => fake()->text(),
            'planned_date' => fake()->dateTime(),
            'completed_date' => fake()->dateTime(),
            'status' => fake()->randomElement(["pendente","em_andamento","concluida"]),
            'responsible_id_id' => Resident::factory(),
        ];
    }
}
