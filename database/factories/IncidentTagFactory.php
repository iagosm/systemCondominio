<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Incident;
use App\Models\IncidentTag;
use App\Models\Tag;

class IncidentTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IncidentTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'incident_id' => Incident::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
