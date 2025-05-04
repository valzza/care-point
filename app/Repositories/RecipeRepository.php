<?php
namespace App\Repositories;

use App\Models\Recipes;
use App\Repositories\IEloquent\IRecipeRepository;

class RecipeRepository extends BaseRepository implements IRecipeRepository
{
    public function __construct(Recipes $model)
    {
        parent::__construct($model);
    }
    
}