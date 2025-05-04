<?php

namespace App\Repositories;

use App\Models\HealthInsurance;
use App\Repositories\IEloquent\IHealthInsuranceRepository;

class HealthInsuranceRepository extends BaseRepository implements IHealthInsuranceRepository
{
    public function __construct(HealthInsurance $model)
    {
        parent::__construct($model);
    }
}
