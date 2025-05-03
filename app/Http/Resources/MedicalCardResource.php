<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class MedicalCardResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Medical Card';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'doctor_id'=>$this->doctor_id,
            'report_id'=>$this->report_id,
            'opening_date'=>$this->opening_date,
            'closing_date'=>$this->closing_date,
            'closing_reason'=>$this->closing_reason,
            'recommendations'=>$this->recommendations,
        ];
    }
}