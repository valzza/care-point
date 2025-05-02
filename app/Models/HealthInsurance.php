<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
