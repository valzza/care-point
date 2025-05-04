<?php

namespace App\Services;

use App\Repositories\DoctorRepository;

class DoctorService extends BaseService
{
    protected $doctorRepository;
    public function __construct(DoctorRepository $doctorRepository)
    {
        parent::__construct($doctorRepository);
        $this->doctorRepository = $doctorRepository;
    }
}