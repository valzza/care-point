<?php

namespace App\Services;

use App\Repositories\PatientRepository;

class PatientService extends BaseService
{
    protected $patientRepository;
    public function __construct(PatientRepository $patientRepository)
    {
        parent::__construct($patientRepository);
        $this->patientRepository = $patientRepository;
    }
}
