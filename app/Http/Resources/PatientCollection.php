<?php 

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class PatientCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Patient';
    }
}