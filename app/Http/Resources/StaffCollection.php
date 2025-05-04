<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class StaffCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Staff';
    }
}
