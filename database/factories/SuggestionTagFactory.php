<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Suggestion;
use App\Models\SuggestionTag;
use App\Models\Tag;

class SuggestionTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuggestionTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'suggestion_id' => Suggestion::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
