<?php 

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class MedicalCardCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Medical Card';
    }
}