<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    public function histories()
    {
        return $this->belongsTo(History::class);
    }
}
