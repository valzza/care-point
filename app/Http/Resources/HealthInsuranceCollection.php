<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class HealthInsuranceCollection extends  AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Health Insurance';
    }
}
