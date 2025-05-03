<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class PatientResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Patient';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'health_insurance_id'=>$this->health_insurance_id,
            'name'=>$this->name,
            'surname'=>$this->surname,
            'birth_date'=>$this->birth_date,
            'gender'=>$this->gender,
            'blood_type'=>$this->blood_type,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'personal_id'=>$this->personal_id,
            'emergency_contact_number'=>$this->emergency_contact_number,
        ];
    }
}