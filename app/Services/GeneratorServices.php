<?php

namespace App\Services;

use App\Models\Recipe;


class GeneratorServices {
    public function __construct(
        protected Recipe $recipe,

        //    catch (Exception $e) {
        //        DB::rollback();
        //        Log::error($e);
        //
        //        return redirect()
        //            ->back()
        //            ->with('flash_error', 'Something went wrong, please try again later');
        //    }

    )
    {}

    public function getAllRecipes($request) : \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->recipe
                    ->query()
//                    ->when($request['filter'], function ($query, $filter){ {
//                        return $query->where->();
//                    })
                    ->with('ingredients')
                    ->simplePaginate(12);

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
