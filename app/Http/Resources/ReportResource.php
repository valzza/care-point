<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class ReportResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Report';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'doctor_id'=>$this->doctor_id,
            'diagnose_id'=>$this->diagnose_id,
            'date'=>$this->date,
            'description'=>$this->description,
        ];
    }
}