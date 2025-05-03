<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class DiagnoseResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Diagnose';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
        ];
    }
}