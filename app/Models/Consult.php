<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable = [
        'doctor_id',
        'medical_card_id',
        'date',
        'problem',
        'treatment',
        'tips',
        'next_visit',
    ];
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function medical_cards(){
        return $this->belongsTo(MedicalCard::class);
    }
}
