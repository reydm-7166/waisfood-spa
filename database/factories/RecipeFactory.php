<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $recipe_name = $this->faker->name;
        $slug = Str::snake($recipe_name, '-');

        return [
            'recipe_name' => $recipe_name,
            'description' => $this->faker->text,
            'author_id' => $this->faker->numberBetween(1, 10),
            'slug' => $slug,
            'is_approved' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime
        ];
    }
}
