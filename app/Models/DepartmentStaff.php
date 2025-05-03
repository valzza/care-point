<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentStaff extends Model
{
    protected $fillable = [
        'department_id',
        'staff_id',
    ];


    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
