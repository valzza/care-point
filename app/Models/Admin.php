<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
