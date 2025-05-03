<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $fillable = [
        'patient_id',
        'test_type',
        'other',
        'result',
        'date',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }

    public function histories()
    {
        return $this->belongsTo(History::class);
    }
}
