<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestSize\TestSize;

class History extends Model
{
    public function medical_card()
    {
        return $this->belongsTo(MedicalCard::class);
    }
    public function tests()
    {
        return $this->hasMany(Tests::class);
    }
}
