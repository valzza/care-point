<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function admins(){
        return $this->belongsTo(Admin::class);
    }
    public function nurses(){
        return $this->belongsTo(Nurse::class);
    }
}
