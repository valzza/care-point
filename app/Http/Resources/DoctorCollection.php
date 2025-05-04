<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class DoctorCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Doctor';
    }
}