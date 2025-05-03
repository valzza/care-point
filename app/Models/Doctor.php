<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'staff_id',
        'specialization',
    ];
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function consults(){
        return $this->hasMany(Consult::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public function recipes(){
        return $this->hasMany(Recipes::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function medical_cards(){
        return $this->belongsTo(MedicalCard::class);
    }
}
