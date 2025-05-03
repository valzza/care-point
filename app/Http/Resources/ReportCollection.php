<?php 

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class ReportCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Report';
    }
}