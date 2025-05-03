<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalCard extends Model
{

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'report_id',
        'opening_date',
        'closing_date',
        'closing_reason',
        'reccomendations',
    ];

    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function histories(){
        return $this->belongsTo(History::class);
    }
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
}
