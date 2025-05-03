<?php
namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\IEloquent\IAppointmentRepository;

class AppointmentRepository extends BaseRepository implements IAppointmentRepository
{
    public function __construct(Appointment $model)
    {
        parent::__construct($model);
    }
    
}