<?php

namespace App\Services;

use App\Models\Recipe;


class GeneratorServices {
    public function __construct(
        protected Recipe $recipe,

    )
    {}

    public function getAllRecipes() : \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->recipe->with('ingredients')->simplePaginate(12);

    }

    public function showRecipe(String $slug)
    {
        return $this->recipe->where('slug', $slug)->first();
    }
    public function filter($status) : \Illuminate\Contracts\Pagination\Paginator
    {

            return $this->recipe->with('ingredients')->where('id', 2)->simplePaginate(12);;

    }
}
