<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class ConsultResource extends AbstractJsonResource
{
    public function getModelName()
    {
        return 'Consult';
    }
    public function toArray(Request $request)
    {
        return[
            'id'=>$this->id,
            'doctor_id'=>$this->doctor_id,
            'medical_card_id'=>$this->medical_card_id,
            'date'=>$this->date,
            'problem'=>$this->problem,
            'treatment'=>$this->treatment,
            'tips'=>$this->tips,
            'next_visit'=>$this->next_visit,
        ];
    }
}