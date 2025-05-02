<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    public function reports(){
        return $this->belongsTo(Report::class);
    }
}
