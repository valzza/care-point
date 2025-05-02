<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function medical_card(){
        return $this->belongsTo(MedicalCard::class);
    }
    public function test(){
        return $this->hasMany(Test::class);
    }
}
