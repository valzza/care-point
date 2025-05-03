<?php


namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class AppointmentResource extends  AbstractJsonResource
{
    public function getModelName()
    {
        return 'Appointment';
    }
    public function toArray(Request $request)
    {
        return[
        'id'=>$this->id,
        'patient_id' =>$this->patient_id,
        'doctor_id' =>$this->doctor_id,
        'date'=>$this->date,
        'time'=>$this->time,
        'appointment_type'=>$this->appointment_type,
        'status'=>$this->status,
        ];
    }
    
}