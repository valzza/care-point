<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable =[
        'name',
        'surname',
        'email',
        'phone',
        'shift_start',
        'shift_end',
        'shift_type',
    ];
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function admins(){
        return $this->belongsTo(Admin::class);
    }
    public function nurses(){
        return $this->belongsTo(Nurse::class);
    }
    public function departments(){
        return $this->belongsToMany(Department::class,'department_staff_id','staff_id','department_id');
    }
}
