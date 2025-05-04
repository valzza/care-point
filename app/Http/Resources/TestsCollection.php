<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class TestsCollection extends  AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Tests';
    }
}
