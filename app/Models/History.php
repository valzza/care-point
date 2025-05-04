<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestSize\TestSize;

class History extends Model
{
    protected $fillable = [
        'medical_card_id',
        'test_id',
        'family_history',
        'surgeries',
        'accidents',
        'pregnancies',
    ];
    public function medical_cards()
    {
        return $this->belongsTo(MedicalCard::class);
    }
    public function tests()
    {
        return $this->hasMany(Tests::class);
    }
}
