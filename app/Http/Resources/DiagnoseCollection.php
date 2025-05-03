<?php 

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class DiagnoseCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Diagnose';
    }
}