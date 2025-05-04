<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;

class AppointmentService extends BaseService
{
    protected $appointmentRepository;
    public function __construct(AppointmentRepository $appointmentRepository)
    {
        parent::__construct($appointmentRepository);
        $this->appointmentRepository = $appointmentRepository;
    }
}
