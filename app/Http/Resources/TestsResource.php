<?php


namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class TestsResource extends  AbstractJsonResource
{
    public function getModelName()
    {
        return 'Tests';
    }
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'test_type' => $this->test_type,
            'other' => $this->other,
            'result' => $this->result,
            'date' => $this->date,
        ];
    }
}
