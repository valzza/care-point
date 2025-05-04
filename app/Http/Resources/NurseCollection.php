<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class NurseCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Nurse';
    }
}