<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    
}
