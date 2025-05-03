<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'time',
        'appointment_type',
        'status',
    ];

    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function departments(){
        return $this->belongsTo(Department::class);
    }
    public function payments(){
        return $this->belongsTo(Payment::class);
    }
}
