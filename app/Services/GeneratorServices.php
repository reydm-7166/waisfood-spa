<?php

namespace App\Services;

use App\Models\Recipe;



class GeneratorServices {
    public function __construct(
        protected Recipe $recipe
    )
    {}

    public function getAllRecipes() : mixed
    {
        return $this->recipe->simplePaginate(12);
    }

    public function showRecipe(String $slug)
    {
        return $this->recipe->where('slug', $slug)->first();

    }
}
