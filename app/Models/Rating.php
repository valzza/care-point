<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'rate',
        'comment',
        'date'
    ];
    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }

}
