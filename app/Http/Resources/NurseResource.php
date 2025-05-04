<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class NurseResource extends AbstractJsonResource
{
    public function getModelName()
    {
        return 'Nurse';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'staff_id'=>$this->staff_id,
            'degree'=>$this->degree,
        ];
    }
}