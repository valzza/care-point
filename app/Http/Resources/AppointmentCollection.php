<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class AppointmentCollection extends  AbstractJsonCollection
{
    public function getModelName()
    {
        return 'Appointment';
    }
    
}