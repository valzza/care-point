<?php


namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class HealthInsuranceResource extends  AbstractJsonResource
{
    public function getModelName()
    {
        return 'Health Insurance';
    }
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'insurance_type' => $this->insurance_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'policy_number' => $this->policy_number,
        ];
    }
}
