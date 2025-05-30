<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'health_insurance_id',
        'name',
        'surname',
        'birth_date',
        'gender',
        'blood_type',
        'phone',
        'email',
        'personal_id',
        'emergency-contact_number',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function medical_cards()
    {
        return $this->belongsTo(MedicalCard::class);
    }
    public function health_insurances()
    {
        return $this->belongsTo(HealthInsurance::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function recipes()
    {
        return $this->hasMany(Recipes::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
