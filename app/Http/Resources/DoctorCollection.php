<?php

namespace App\Http\Resources;

use App\Http\Resource\AbstractJsonCollection;

class DoctorCollection extends AbstractJs
{
    public function getModelName()
    {
        return 'Doctor';
    }
}