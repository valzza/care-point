<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class DoctorResource extends AbstractJsonResource
{
    public function getModelName()
    {
        return 'Doctor';
    }
    public function toArray(Request $request)
    {
        return[
            'id'=>$this->id,
            'staff_id'=>$this->staff_id,
            'specialization'=>$this->specialization,
        ];
    }
}