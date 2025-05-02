<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalCard extends Model
{
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
