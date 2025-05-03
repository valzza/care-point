<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'name',
    ];

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'department_staff_id', 'department_id', 'staff_id');
    }
}
