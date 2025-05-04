<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'appointment_id',
        'amount',
        'date',
        'method',
        'status'
    ];
    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
}
