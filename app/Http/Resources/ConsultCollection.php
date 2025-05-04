<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class ConsultCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Consult';
    }
}