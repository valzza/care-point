<?php

namespace App\Services;

use App\Repositories\HealthInsuranceRepository;

class HealthInsuranceService extends BaseService
{
    protected $healthInsuranceRepository;
    public function __construct(HealthInsuranceRepository $healthInsuranceRepository)
    {
        parent::__construct($healthInsuranceRepository);
        $this->healthInsuranceRepository = $healthInsuranceRepository;
    }
}
