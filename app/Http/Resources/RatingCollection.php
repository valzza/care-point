<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class RatingCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Rating';
    }
}