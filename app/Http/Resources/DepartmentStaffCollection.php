<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class DepartmentStaffCollection extends  AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Department Staff';
    }
}
