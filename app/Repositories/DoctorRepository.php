<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Repositories\IEloquent\IDoctorRepository;

class DoctorRepository extends BaseRepository implements IDoctorRepository
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);         
    }
}