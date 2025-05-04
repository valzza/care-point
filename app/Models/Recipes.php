<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'medicaments',
        'date',
        'alergies',
        'usage_instructions'
    ];
    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
}
