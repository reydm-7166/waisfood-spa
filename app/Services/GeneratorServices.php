<?php

namespace App\Services;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\Paginator;


class GeneratorServices {
    public function __construct(
        protected Recipe $recipe,
    )
    {}

    public function getAllRecipes($request) : Paginator
    {
        return $this->recipe
                    ->query()
                    ->with('ingredients')
                    ->simplePaginate(12);

    }

    public function showRecipe(String $slug)
    {
        return $this->recipe
                    ->where('slug', $slug)
                    ->with('ingredients')
                    ->first();
    }
    public function filter($status) : Paginator
    {

            return $this->recipe->with('ingredients')->where('id', 2)->simplePaginate(12);

    }
}
