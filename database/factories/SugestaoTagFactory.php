<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sugestao;
use App\Models\SugestaoTag;
use App\Models\Tag;

class SugestaoTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SugestaoTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sugestao_id' => Sugestao::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
