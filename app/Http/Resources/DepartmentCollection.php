<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class DepartmentCollection extends  AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Department';
    }
}
