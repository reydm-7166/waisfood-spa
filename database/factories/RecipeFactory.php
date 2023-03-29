<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'recipe_name' => $this->faker->name,
            'description' => $this->faker->text,
            'author_id' => $this->faker->numberBetween(1, 10),
            'is_approved' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime
        ];
    }
}
