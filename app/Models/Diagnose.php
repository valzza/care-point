<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    public function reports(){
        return $this->belongsTo(Report::class);
    }
}
