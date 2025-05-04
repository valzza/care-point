<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class AdminCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Admin';
    }
}