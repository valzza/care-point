<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class HistoryResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'History';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'medical_card_id'=>$this->medical_card_id,
            'test_id'=>$this->test_id,
            'family_history'=>$this->family_history,
            'surgeries'=>$this->surgeries,
            'accidents'=>$this->accidents,
            'pregnancies'=>$this->pregnancies,
        ];
    }
}