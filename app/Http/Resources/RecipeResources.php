<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class RecipeResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Recipe';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'doctor_id'=>$this->doctor_id,
            'medicaments'=>$this->medicaments,
            'alergies'=>$this->alergies,
            'date'=>$this->date,
            'usage_instructions'=>$this->usage_instructions,
        ];
    }
}