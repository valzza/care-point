<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentStaff extends Model
{
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
