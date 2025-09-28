<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OcorrenciaTag;
use App\Models\Ocorrencium;
use App\Models\Tag;

class OcorrenciaTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OcorrenciaTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ocorrencia_id' => Ocorrencium::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
