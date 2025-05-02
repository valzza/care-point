<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function medical_cards(){
        return $this->belongsTo(MedicalCard::class);
    }
}
