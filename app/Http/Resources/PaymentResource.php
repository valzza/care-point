<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonResource;
use Illuminate\Http\Request;

class PaymentResource extends AbstractJsonResource 
{
    public function getModelName()
    {
        return 'Payment';
    }
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'appointment_id'=>$this->appointment_id,
            'amount'=>$this->amount,
            'date'=>$this->date,
            'method'=>$this->method,
            'status'=>$this->status,
        ];
    }
}