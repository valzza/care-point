<?php

namespace App\Services;

use App\Repositories\RecipeRepository;

class RecipeService extends BaseService
{
    protected $recipeRepository;
    public function __construct(RecipeRepository $recipeRepository)
    {
        parent::__construct($recipeRepository);
        $this->recipeRepository = $recipeRepository;
    }
}
