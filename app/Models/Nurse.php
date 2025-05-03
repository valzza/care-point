<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = [
        'staff_id',
        'degree',
    ];
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
