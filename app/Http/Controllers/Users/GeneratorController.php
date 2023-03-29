<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Services\GeneratorServices;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        protected GeneratorServices $generatorServices,
    ){}

    public function index()
    {
        return Inertia('Users/Generator/Index', [
            'recipes' => $this->generatorServices->getAllRecipes()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
