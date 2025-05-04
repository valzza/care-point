<?php


namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class DepartmentStaffResource extends  AbstractJsonResource
{
    public function getModelName()
    {
        return 'Department';
    }
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'department_id' => $this->department_id,
            'staff_id' => $this->staff_id
        ];
    }
}
