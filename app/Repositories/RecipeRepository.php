<?php
namespace App\Repositories;

use App\Models\Recipe;
use App\Repositories\IEloquent\IRecipeRepository;

class RecipeRepository extends BaseRepository implements IRecipeRepository
{
    public function __construct(Recipes $model)
    {
        parent::__construct($model);
    }
    
}