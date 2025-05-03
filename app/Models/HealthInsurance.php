<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{
    protected $fillable = [
        'company_name',
        'insurance_type',
        'start_date',
        'end_date',
        'policy_number',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
