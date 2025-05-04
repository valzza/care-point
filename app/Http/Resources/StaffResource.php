<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class StaffResource extends AbstractJsonResource
{
    public function getModelName()
    {
        return 'Staff';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'surname'=>$this->surname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'role'=>$this->role,
            'shift_start'=>$this->shift_start,
            'shift_end'=>$this->shift_end,
            'shift_type'=>$this->shift_type,
        ];
    }
}