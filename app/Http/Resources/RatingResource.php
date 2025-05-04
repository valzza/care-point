<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class RatingResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Rating';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'doctor_id'=>$this->doctor_id,
            'rate'=>$this->rate,
            'comment'=>$this->comment,
            'date'=>$this->date,
        ];
    }
}