<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\RecipeResource;
use App\Models\Recipes;
use App\Services\RecipeService;
use Exception;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    protected RecipeService $recipeService;
    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }
    public function index()
    {
        try {
            $recipe = $this->recipeService->all();
            if ($recipe->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new RecipeCollection($recipe));
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
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
        try {
            $recipe = $this->recipeService->save($request);
            return $this->created(new RecipeResource($recipe));
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipes)
    {
        try {
            $recipe = $this->recipeService->find($id);
            if ($recipe) {
                return $this->okWithResource(new RecipeResource($recipe));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipes)
    {
        try {
            $recipe = $this->recipeService->find($id);
            if ($recipe) {
                $recipe = $this->recipeService->update($request, $id);
                return $this->okWithResource(new RecipeResource($recipe));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $recipe = $this->recipeService->find($id);
            if ($recipe) {
                $this->recipeService->delete($id);
                return $this->deleted(new EmptyResource($recipe));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
