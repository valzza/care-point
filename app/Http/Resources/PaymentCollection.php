<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class PaymentCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Payment';
    }
}