<?php


namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class DepartmentResource extends  AbstractJsonResource
{
    public function getModelName()
    {
        return 'Department';
    }
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
