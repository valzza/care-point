<?php
namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\IEloquent\IPatientRepository;

class PatientRepository extends BaseRepository implements IPatientRepository
{
    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }
    
}