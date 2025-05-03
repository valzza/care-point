<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'diagnose_id',
        'date',
        'description',
    ];

    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function diagnoses(){
        return $this->belongsTo(Diagnose::class);
    }
}
