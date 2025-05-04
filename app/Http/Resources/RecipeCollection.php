<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class RecipeCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Recipe';
    }
}